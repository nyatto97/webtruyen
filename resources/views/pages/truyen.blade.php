@extends('../layout')
{{-- @section('slide')
    @include('pages.slide')
@endsection --}}

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="{{url('the-loai/'.$truyen->theloai->slug_theloai)}}">{{$truyen->theloai->tentheloai}}</a></li>
            <li class="breadcrumb-item"><a href="{{url('danh-muc/'.$truyen->danhmuctruyen->slug_danhmuc)}}">{{$truyen->danhmuctruyen->tendanhmuc}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$truyen->tentruyen}}</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-9 card">
            <div class="row">
                <div class="col-md-5 mt-3">
                    <img class="bd-placeholder-img card-img-top" src="{{asset('public/uploads/truyen/'.$truyen->hinhanh)}}">
                </div>
                <div class="col-md-7 mt-3">
                    <style type="text/css">
                        .infotruyen{
                            list-style: none;
                        }
                    </style>
                    <ul class="infotruyen">

                        <!--------------Lấy biến wishlist------------>
                        <input type="hidden" value="{{$truyen->tentruyen}}" class="wishlist_title">
                        <input type="hidden" value="{{\URL::current()}}" class="wishlist_url">
                        <input type="hidden" value="{{$truyen->id}}" class="wishlist_id">
                        <!--------------End Lấy biến wishlist------------>

                        <h3 class="mb-3"><b><li>{{$truyen->tentruyen}}</li></b></h3>
                        <li>
                            @if ($truyen->created_at != '')
                                Ngày đăng: {{$truyen->created_at->diffForHumans()}}
                            @endif
                        </li>
                        <li>Tác giả: {{$truyen->tacgia}}</li>
                        <li>Danh mục truyện: <a href="{{url('danh-muc/'.$truyen->danhmuctruyen->slug_danhmuc)}}">{{$truyen->danhmuctruyen->tendanhmuc}}</a></li>
                        <li>Thể loại truyện: <a href="{{url('the-loai/'.$truyen->theloai->slug_theloai)}}">{{$truyen->theloai->tentheloai}}</a></li>
                        <li>
                            Số chương: 
                            @php
                                $so_chapter = count($chapter);
                            @endphp
                            {{$so_chapter}}
                        </li>
                        <li>Lượt xem: {{$truyen->views}}</li>
                        {{-- <div class="fb-like" data-href="{{\URL::current()}}" data-width="" data-layout="button_count" data-action="like" data-size="small" data-share="true"></div> --}}
                        <div class="fb-share-button" data-href="{{\URL::current()}}" data-layout="button_count" data-size="small"><a target="_blank" href="{{\URL::current()}}&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Chia sẻ</a></div>
                        <li><a href="#xemmucluc">Xem mục lục</a></li>
                        
                        @if($chapter_dau)
                            <li>
                                <a href="{{url('xem-chapter/'.$chapter_dau->slug_chapter)}}" class="btn btn-primary">Đọc Truyện</a>
                                <a href="{{url('xem-chapter/'.$chapter_moinhat->slug_chapter)}}" class="btn btn-success">Đọc chương mới nhất</a>
                            </li>
                            <li>
                                <button class="btn btn-danger btn-thich-truyen mt-1"><i class="fa fa-heart" aria-hidden="true"></i>Thích truyện</button>
                            </li>
                        @else
                        <li><a class="btn btn-danger">Chưa có chương</a></li>
                        @endif
                    </ul>
                </div>
                
                <div class="col-md-12 mt-3 shadow-sm">
                    <p>{!! $truyen->tomtat !!}</p>
                </div>
                <hr>
                
            </div>

            <style type="text/css">
                .tagcloud05 ul {
                    margin: 0;
                    padding: 0;
                    list-style: none;
                }
                .tagcloud05 ul li {
                    display: inline-block;
                    margin: 0 0 .3em 1em;
                    padding: 0;
                }
                .tagcloud05 ul li a {
                    position: relative;
                    display: inline-block;
                    height: 30px;
                    line-height: 30px;
                    padding: 0 1em;
                    background-color: #3498db;
                    border-radius: 0 3px 3px 0;
                    color: #fff;
                    font-size: 13px;
                    text-decoration: none;
                    -webkit-transition: .2s;
                    transition: .2s;
                }
                .tagcloud05 ul li a::before {
                    position: absolute;
                    top: 0;
                    left: -15px;
                    content: '';
                    width: 0;
                    height: 0;
                    border-color: transparent #3498db transparent transparent;
                    border-style: solid;
                    border-width: 15px 15px 15px 0;
                    -webkit-transition: .2s;
                    transition: .2s;
                }
                .tagcloud05 ul li a::after {
                    position: absolute;
                    top: 50%;
                    left: 0;
                    z-index: 2;
                    display: block;
                    content: '';
                    width: 6px;
                    height: 6px;
                    margin-top: -3px;
                    background-color: #fff;
                    border-radius: 100%;
                }
                .tagcloud05 ul li span {
                    display: block;
                    max-width: 100px;
                    white-space: nowrap;
                    text-overflow: ellipsis;
                    overflow: hidden;
                }
                .tagcloud05 ul li a:hover {
                    background-color: #555;
                    color: #fff;
                }
                .tagcloud05 ul li a:hover::before {
                    border-right-color: #555;
                }
            </style>
            <p class="mt-3">Từ khóa tìm kiếm: 

                @php
                    $tukhoa = explode(",",$truyen->tukhoa);
                @endphp

                <div class="tagcloud05">
                    <ul>
                        @foreach($tukhoa as $key => $tu)
                            <li><a href="{{url('tag/'.\Str::slug($tu))}}"><span>{{$tu}}</span></a></li>
                        @endforeach
                    </ul>
                </div>
 
            </p>

            <h4 id="xemmucluc">Danh sách chương</h4>
            <ul class="mucluctruyen">
                @php
                    $mucluc = count($chapter);
                @endphp
                @if ($mucluc>0)
                    @foreach ($chapter as $key =>$chap)
                        <li><a href="{{url('xem-chapter/'.$chap->slug_chapter)}}">{{$chap->tieude}}</a></li>
                    @endforeach
                @else
                <li>Đang cập nhật...</li>
                @endif
            </ul>

            <div class="fb-comments shadow-sm" data-href="{{\URL::current()}}" data-width="100%" data-numposts="10"></div>
            
            <h4 class="mt-5">Truyện cùng thể loại</h4>
            <div class="row text-center">
                @foreach ($cungdanhmuc as $key => $value)
                    <div class="col-md-3">
                        <div class="card mb-3 shadow-sm">
                            <img class="bd-placeholder-img card-img-top" src="{{asset('public/uploads/truyen/'.$value->hinhanh)}}" height="300">

                            <div class="card-body">
                                    <h5>{{$value->tentruyen}}</h5>
                                    {{-- <p class="card-text">{{$value->tomtat}}</p> --}}
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                        <a href="{{url('xem-truyen/'.$value->slug_truyen)}}" class="btn btn-sm btn-outline-secondary">Đọc ngay</a>
                                        <a><i class="fas fa-eye btn btn-sm btn-outline-secondary">{{$value->views}}</i></a>
                                        </div>
                                        {{-- <small class="text-muted">9 phút trước</small> --}}
                                    </div>
                            </div>
                        </div>
                    </div>                       
                @endforeach
            </div>
            {{$cungdanhmuc->links()}}
        </div>

        <style type="text/css">
            .col-md-7.sidebar a {
                font-size: 15px;
                text-decoration: none;
                color: #000;
            }
            .col-md-7.sidebar{
                padding: 0;
            }
            .card-header{
                background: rgb(224, 134, 146) !important;
            }
        </style>


        <div class="col-md-3 card">
            <div class="mt-2">
                <h3 class="card-header">Truyện HOT</h3>
                @foreach ($truyennoibat as $key =>$noibat)
                    <div class="row mt-2">
                        <div class="col-md-5">
                            <img class="img img-responsive card-img-top" width="100%" src="{{asset('public/uploads/truyen/'.$noibat->hinhanh)}}" alt="{{$noibat->tentruyen}}">
                            
                        </div>
                        <div class="col-md-7 sidebar mt-2">
                            <a href="{{url('xem-truyen/'.$noibat->slug_truyen)}}">{{$noibat->tentruyen}}</a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-3">
                <h3 class="card-header">Truyện xem nhiều</h3>
                @foreach ($truyenxemnhieu as $key =>$xemnhieu)
                    <div class="row mt-2">
                        <div class="col-md-5">
                            <img class="img img-responsive card-img-top" width="100%" src="{{asset('public/uploads/truyen/'.$xemnhieu->hinhanh)}}" alt="{{$xemnhieu->tentruyen}}">
                            
                        </div>
                        <div class="col-md-7 sidebar mt-2">
                            <a href="{{url('xem-truyen/'.$xemnhieu->slug_truyen)}}">{{$xemnhieu->tentruyen}}</a>
                            <p><i class="fas fa-eye">{{$xemnhieu->views}}</i></p>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-3">
                <h3 class="title_truyen card-header">Truyện yêu thích</h3>
                <div id="yeuthich"></div>
            </div>
            
        </div>
    </div>

@endsection