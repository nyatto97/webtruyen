@extends('../layout')
{{-- @section('slide')
    @include('pages.slide')
@endsection --}}
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
        <li class="breadcrumb-item"><a href="{{url('the-loai/'.$truyen_breadcrumb->theloai->slug_theloai)}}">{{$truyen_breadcrumb->theloai->tentheloai}}</a></li>
        <li class="breadcrumb-item"><a href="{{url('danh-muc/'.$truyen_breadcrumb->danhmuctruyen->slug_danhmuc)}}">{{$truyen_breadcrumb->danhmuctruyen->tendanhmuc}}</a></li>
        <li class="breadcrumb-item"><a href="{{url('xem-truyen/'.$truyen_breadcrumb->slug_truyen)}}">{{$truyen_breadcrumb->tentruyen}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{$chapter->tieude}}</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12">
            <div class="chapter-nav mb-5">
                <b><h3>{{$chapter->truyen->tentruyen}}</h3></b>
                <br>
                <p>{{$chapter->tieude}}</p>
            </div>
            
            <div class="col-md-12 text-center">

                <style type="text/css">
                    .isDisabled{
                        color: currentColor;
                        pointer-events: none;
                        opacity: 0.5;
                        text-decoration: none;
                    }
                    .form-group{
                        position: relative;
                        display: inline-block;
                        vertical-align: middle;
                    }
                    .chapter-nav{
                        text-align: center;
                    }
                </style>
                
                <div class="form-group text-center">
                    {{-- <a class=" btn btn-primary {{$chapter->id==$min_id->id ? 'isDisabled' : ''}}" href="{{url('xem-chapter/'.$previous_chapter)}}">Chương trước</a>
                    <select name="kichhoat" class="custom-select select-chapter">
                        @foreach ($all_chapter as $key => $chap)
                            <option value="{{url('xem-chapter/'.$chap->slug_chapter)}}">{{$chap->tieude}}</option>
                        @endforeach
                    </select> --}}

                    <button type="button">
                        <a class="btn btn-primary {{$chapter->id==$min_id->id ? 'isDisabled' : ''}}" href="{{url('xem-chapter/'.$previous_chapter)}}">Chương trước</a>
                    </button>
                    <button>
                        <select name="kichhoat" class="custom-select select-chapter">
                            @foreach ($all_chapter as $key => $chap)
                                <option value="{{url('xem-chapter/'.$chap->slug_chapter)}}">{{$chap->tieude}}</option>
                            @endforeach
                        </select>
                    </button>
                    <button>
                        <a class="btn btn-primary {{$chapter->id==$max_id->id ? 'isDisabled' : ''}}" href="{{url('xem-chapter/'.$next_chapter)}}">Chương sau</a>
                    </button>

                    {{-- <a class="btn btn-primary {{$chapter->id==$max_id->id ? 'isDisabled' : ''}}" href="{{url('xem-chapter/'.$next_chapter)}}">Chương sau</a> --}}

                    <br>
                </div>
                
            </div>
           
            <div class="noidungchuong">
                {!! $chapter->noidung !!}
            </div>
            
            <div class="col-md-12 text-center mt-5">
                <div class="form-group">
                    <button>
                        <a class="btn btn-primary {{$chapter->id==$min_id->id ? 'isDisabled' : ''}}" href="{{url('xem-chapter/'.$previous_chapter)}}">Chương trước</a>
                    </button>
                    <button>
                        <select name="kichhoat" class="custom-select select-chapter">
                            @foreach ($all_chapter as $key => $chap)
                                <option value="{{url('xem-chapter/'.$chap->slug_chapter)}}">{{$chap->tieude}}</option>
                            @endforeach
                        </select>
                    </button>
                    <button>
                        <a class="btn btn-primary {{$chapter->id==$max_id->id ? 'isDisabled' : ''}}" href="{{url('xem-chapter/'.$next_chapter)}}">Chương sau</a>
                    </button>
                </div>
            </div>

            <h3>Lưu và chia sẻ truyện: </h3>
            <div class="fb-share-button" data-href="{{\URL::current()}}" data-layout="button_count" data-size="small"><a target="_blank" href="{{\URL::current()}}&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Chia sẻ</a></div>

            <div class="row">
                <div class="col-md-12">
                    <div class="fb-comments" data-href="{{\URL::current()}}" data-width="100%" data-numposts="10"></div>
                </div>
            </div>
     
        </div>
    </div>
@endsection