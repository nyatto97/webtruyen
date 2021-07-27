<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DanhmucTruyen;
use App\Models\Truyen;
use App\Models\Chapter;
use App\Models\Theloai;

class IndexController extends Controller
{
    public function timkiem_ajax(Request $request){
        $data = $request->all;

        if ($data['keywords']) {
            $truyen = Truyen::where('tinhtrang',0)->where('tentruyen','LIKE','%'.$data['keywords'].'%')->orWhere('tacgia','LIKE','%'.$data['keywords'].'%')->get();

            $output = '
                <ul class="dropdown-menu style="display:block;">';

                foreach($truyen as $key =>$tr){
                    $output .= '
                    <li class="li_search_ajax"><a href="#">'.$tr->tentruyen.'</a></li>';
                }

                $output .= '</ul>';
                echo $output;
        }
    }

    public function home(){
        $danhmuc = DanhmucTruyen::orderBy('id', 'DESC')->get();

        $slide_truyen = Truyen::orderBy('id', 'DESC')->where('kichhoat',0)->where('truyennoibat',1)->take(10)->get();
        
        $theloai = Theloai::orderBy('id', 'ASC')->get();
        
        $truyenmoi = Truyen::orderBy('id', 'DESC')->where('kichhoat',0)->where('truyennoibat',0)->take(12)->get();

        $truyenxemnhieu = Truyen::orderBy('id', 'DESC')->where('kichhoat',0)->where('truyennoibat', 2)->take(15)->get();

        $check_full = Truyen::orderBy('id', 'DESC')->where('kichhoat',0)->where('checkfull',1)->paginate(12);


        return view('pages.home')->with(compact('danhmuc', 'truyenmoi', 'theloai', 'slide_truyen', 'check_full', 'truyenxemnhieu'));
    }
    public function danhmuc($slug){
        $danhmuc = DanhmucTruyen::orderBy('id', 'DESC')->get();

        $theloai = Theloai::orderBy('id', 'DESC')->get();
        
        $slide_truyen = Truyen::orderBy('id', 'DESC')->where('kichhoat',0)->take(8)->get();
        
        $danhmuc_id = DanhmucTruyen::where('slug_danhmuc', $slug)->first();
        
        $tendanhmuc = $danhmuc_id->tendanhmuc;
        
        $truyen = Truyen::orderBy('id', 'DESC')->where('kichhoat',0)->where('danhmuc_id', $danhmuc_id->id)->paginate(12);
        
        return view('pages.danhmuc')->with(compact('danhmuc', 'truyen', 'tendanhmuc', 'theloai', 'slide_truyen'));
    }
    public function theloai($slug){
        $danhmuc = DanhmucTruyen::orderBy('id', 'DESC')->get();

        $theloai = Theloai::orderBy('id', 'DESC')->get();

        $slide_truyen = Truyen::orderBy('id', 'DESC')->where('kichhoat',0)->take(8)->get();
        
        $theloai_id = Theloai::where('slug_theloai', $slug)->first();
        
        $tentheloai = $theloai_id->tentheloai;
        
        $truyen = Truyen::orderBy('id', 'DESC')->where('kichhoat',0)->where('theloai_id', $theloai_id->id)->get();
        
        return view('pages.theloai')->with(compact('danhmuc', 'truyen', 'tentheloai', 'theloai', 'slide_truyen'));
    }
    public function xemtruyen($slug){
        $danhmuc = DanhmucTruyen::orderBy('id', 'DESC')->get();

        $theloai = Theloai::orderBy('id', 'DESC')->get();

        $slide_truyen = Truyen::orderBy('id', 'DESC')->where('kichhoat',0)->take(8)->get();
        
        $truyen = Truyen::with('danhmuctruyen', 'theloai')->where('slug_truyen',$slug)->where('kichhoat',0)->first();

        $truyennoibat = Truyen::where('truyennoibat', 1)->take(5)->get();
        $truyenxemnhieu = Truyen::where('truyennoibat', 2)->take(5)->get();

        $chapter = Chapter::with('truyen')->orderBy('id', 'ASC')->where('truyen_id',$truyen->id)->get();

        $chapter_dau = Chapter::with('truyen')->orderBy('id', 'ASC')->where('truyen_id',$truyen->id)->first();

        $chapter_moinhat = Chapter::with('truyen')->orderBy('id', 'DESC')->where('truyen_id',$truyen->id)->first();

        $cungdanhmuc = Truyen::with('danhmuctruyen', 'theloai')->where('danhmuc_id',$truyen->danhmuctruyen->id)->whereNotIn('id',[$truyen->id])->paginate(8);
        
        return view('pages.truyen')->with(compact('danhmuc', 'truyen', 'chapter', 'cungdanhmuc', 'chapter_dau', 'chapter_moinhat', 'theloai', 'slide_truyen', 'truyennoibat', 'truyenxemnhieu'));
    }
    public function xemchapter($slug)
    {
        $danhmuc = DanhmucTruyen::orderBy('id', 'DESC')->get();

        $theloai = Theloai::orderBy('id', 'DESC')->get();

        $slide_truyen = Truyen::orderBy('id', 'DESC')->where('kichhoat',0)->take(8)->get();

        $truyen = Chapter::where('slug_chapter',$slug)->first();

        //breadcrumb
        $truyen_breadcrumb = Truyen::with('danhmuctruyen', 'theloai')->where('id',$truyen->truyen_id)->first();
        //end breadcrumb

        $chapter = Chapter::with('truyen')->where('slug_chapter',$slug)->where('truyen_id',$truyen->truyen_id)->first();

        $all_chapter = Chapter::with('truyen')->orderBy('id', 'ASC')->where('truyen_id',$truyen->truyen_id)->get();

        $next_chapter = Chapter::where('truyen_id',$truyen->truyen_id)->where('id','>',$chapter->id)->min('slug_chapter');

        $previous_chapter = Chapter::where('truyen_id',$truyen->truyen_id)->where('id','<',$chapter->id)->max('slug_chapter');

        $max_id = Chapter::where('truyen_id',$truyen->truyen_id)->orderBy('id', 'DESC')->first();

        $min_id = Chapter::where('truyen_id',$truyen->truyen_id)->orderBy('id', 'ASC')->first();

        return view('pages.chapter')->with(compact('danhmuc', 'chapter', 'all_chapter', 'next_chapter', 'previous_chapter', 'max_id', 'min_id', 'theloai', 'truyen_breadcrumb', 'slide_truyen'));
    }
    // public function timkiem(){
    //     $danhmuc = DanhmucTruyen::orderBy('id', 'DESC')->get();

    //     $theloai = Theloai::orderBy('id', 'DESC')->get();

    //     $slide_truyen = Truyen::orderBy('id', 'DESC')->where('kichhoat',0)->take(8)->get();

    //     $tukhoa = $_GET['tukhoa'];

    //     $truyen = Truyen::with('danhmuctruyen', 'theloai')->where('tentruyen', 'LIKE', '%'.$tukhoa.'%')->orWhere('tomtat', 'LIKE', '%'.$tukhoa.'%')->orWhere('tacgia', 'LIKE', '%'.$tukhoa.'%')->get();
    

    //     return view('pages.timkiem')->with(compact('danhmuc', 'truyen', 'theloai', 'slide_truyen', 'tukhoa'));
    // }
    public function timkiem(Request $request){
        $data = $request->all();
        // $info = Info::find(1);
        $title = 'Tìm kiếm';

        $danhmuc = DanhmucTruyen::orderBy('id', 'DESC')->get();

        $theloai = Theloai::orderBy('id', 'DESC')->get();

        $slide_truyen = Truyen::with('danhmuctruyen', 'theloai')->orderBy('id', 'DESC')->where('kichhoat',0)->take(8)->get();

        $tukhoa = $data['tukhoa'];

        $truyen = Truyen::with('danhmuctruyen', 'theloai')->where('tentruyen', 'LIKE', '%'.$tukhoa.'%')->orWhere('tomtat', 'LIKE', '%'.$tukhoa.'%')->orWhere('tacgia', 'LIKE', '%'.$tukhoa.'%')->get();
    

        return view('pages.timkiem')->with(compact('danhmuc', 'truyen', 'theloai', 'slide_truyen', 'tukhoa', 'title'));
    }
    public function tag($tag){
        // $data = $request->all();
        // $info = Info::find(1);
        $title = 'Tìm kiếm từ khóa';

        $danhmuc = DanhmucTruyen::orderBy('id', 'DESC')->get();

        $theloai = Theloai::orderBy('id', 'DESC')->get();

        $slide_truyen = Truyen::with('danhmuctruyen', 'theloai')->orderBy('id', 'DESC')->where('kichhoat',0)->take(8)->get();

        $tags = explode("-",$tag);

        $truyen = Truyen::with('danhmuctruyen', 'theloai')->where(
            function ($query) use ($tags){
                for($i = 0; $i < count($tags); $i++){
                    $query->orwhere('tukhoa', 'like', '%' .$tags[$i] .'%');
                }
            }
        )->paginate(4);
    

        return view('pages.tag')->with(compact('danhmuc', 'truyen', 'theloai', 'slide_truyen', 'tag', 'title'));
    }
}