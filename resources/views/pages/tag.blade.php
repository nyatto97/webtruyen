@extends('../layout')
{{-- @section('slide')
@include('pages.slide')
@endsection --}}
@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
    <li class="breadcrumb-item active" aria-current="page">Tìm kiếm</li>
    </ol>
</nav>

<h3>Bạn tìm kiếm với tag là : {{$tag}}</h3>
    <div class="album py-5 bg-light">
        <div class="container">                   
            <div class="row">
                @php
                    $count = count($truyen);
                @endphp
                @if ($count==0)
                    <div class="col-md-12">
                        <div class="card mb-12 shadow-sm">
                            <div class="card-body">
                                <p>Không tìm thấy truyện...</p>
                            </div>
                        </div>
                    </div>    
                @else
                    @foreach ($truyen as $key => $value)
                        <div class="col-md-3">
                            <div class="card mb-3 shadow-sm">
                                <img class="bd-placeholder-img card-img-top" src="{{asset('public/uploads/truyen/'.$value->hinhanh)}}" height="350">

                                <div class="card-body">
                                        <h5 class="text-center">{{$value->tentruyen}}</h5>
                                        <p class="card-text">{{$value->tomtat}}</p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            
                                            <a href="{{url('xem-truyen/'.$value->slug_truyen)}}" class="btn btn-sm btn-outline-secondary">Đọc ngay</a>
                                            <a><i class="fas fa-eye btn btn-sm btn-outline-secondary">{{$value->views}}</i></a>
                                            
                                            <small class="text-muted">
                                                @if ($value->updated_at != '')
                                                    {{$value->updated_at->diffForHumans()}}
                                                @else
                                                    {{$value->created_at->diffForHumans()}}
                                                @endif
                                            </small>
                                        </div>
                                </div>
                            </div>
                        </div>                       
                    @endforeach
                @endif
            </div>
        
        </div>
        {{-- {{$truyen->links()}} --}}
    </div>

           
@endsection