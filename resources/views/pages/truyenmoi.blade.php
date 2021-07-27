<div class="container">                   
    <div class="row">
        <div class="col-md-9 card">
            <h3 class="mt-3" style="color: rgb(57, 117, 185)">TRUYỆN MỚI CẬP NHẬT</h3>
            <div class="row">
                @foreach ($truyenmoi as $key => $value)
                    <div class="col-md-3 text-center">
                        
                        <div class="card mb-3 shadow-sm">
                            <img class="bd-placeholder-img card-img-top" src="{{asset('public/uploads/truyen/'.$value->hinhanh)}}" height="300">

                            <div class="card-body">
                                    <h5>{{$value->tentruyen}}</h5>
                                    {{-- <p class="card-text">{{$value->tomtat}}</p> --}}
                                    <div class="d-flex justify-content-between align-items-center">
                                        
                                        <a href="{{url('xem-truyen/'.$value->slug_truyen)}}" class="btn btn-sm btn-outline-primary">Đọc ngay</a>
                                        {{-- <a><i class="fas fa-eye btn btn-sm btn-outline-success">{{$value->views}}</i></a> --}}
                                        <a>
                                            <small class="text-muted">
                                                @if ($value->updated_at != '')
                                                    {{$value->updated_at->diffForHumans()}}
                                                @else
                                                    {{$value->created_at->diffForHumans()}}
                                                @endif
                                            </small>
                                        </a>
                                        
                                    </div>
                            </div>
                        </div>
                        
                    </div> 
                @endforeach
            </div>                 
        </div>

        <div class="col-md-3 card text-center">
            <h3 class="mt-3" style="color: rgb(73, 44, 204)">Truyện Xem Nhiều</h3>
            @foreach ($truyenxemnhieu as $key =>$xemnhieu)
                    <div class="row mt-2">
                        <div class="col-md-5">
                            <img class="img img-responsive card-img-top" width="100%" src="{{asset('public/uploads/truyen/'.$xemnhieu->hinhanh)}}" alt="{{$xemnhieu->tentruyen}}">
                            
                        </div>
                        <div class="col-md-7 sidebar">
                            <a href="{{url('xem-truyen/'.$xemnhieu->slug_truyen)}}"></a>
                            <p>{{$xemnhieu->tentruyen}}</p>
                            <p><i class="fas fa-eye">{{$xemnhieu->views}}</i></p>
                        </div>
                    </div>
            @endforeach
        </div>
     
    </div>

</div>