<div class="container">
    <div class="row">
        <div class="col-md-12"><h3 class="mt-5" style="color: rgb(57, 117, 185)">TRUYỆN ĐÃ FULL</h3></div>
        @foreach ($check_full as $key => $check)
                {{-- @if ($check->checkfull==1) --}}
                <div class="col-md-3 text-center">
                <div class="card mb-3 shadow-sm">
                    <img class="bd-placeholder-img card-img-top" src="{{asset('public/uploads/truyen/'.$check->hinhanh)}}" height="300">

                    <div class="card-body">
                            <h5>{{$check->tentruyen}}</h5>
                            <div class="justify-content-between align-items-center">
                                
                                <a href="{{url('xem-truyen/'.$check->slug_truyen)}}" class="btn btn-sm btn-outline-primary">Đọc ngay</a>
                                <a><i class="fas fa-eye btn btn-sm btn-outline-success">{{$check->views}}</i></a>
                                <a class="btn btn-sm btn-outline-danger">FULL</a>
                            </div>
                    </div>
                </div>
                </div>                          
                {{-- @endif --}}
        @endforeach
       
    </div>
    
    {{$check_full->links()}}
</div>