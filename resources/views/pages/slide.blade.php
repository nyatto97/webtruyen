<h3 class="mt-5" style="color: rgb(238, 14, 14)">TRUYỆN HOT</h3>
<div class="owl-carousel owl-theme text-center">
    @foreach ($slide_truyen as $key => $value)
        @if ($value->truyennoibat == 1)
            <div class="item card mb-3 shadow-sm">
                <img src="{{asset('public/uploads/truyen/'.$value->hinhanh)}}" height="335">
                <h5 class="mt-3">{{$value->tentruyen}}</h5>
                <p><i class="fas fa-eye">{{$value->views}}</i></p>
                <a href="{{url('xem-truyen/'.$value->slug_truyen)}}" class="btn btn-sm btn-outline-danger">Đọc ngay</a>
            </div>
        @endif
    @endforeach
    
</div>