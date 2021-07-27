@extends('../layout')
@section('slide')
    @include('pages.slide')
@endsection
@section('content')

    <div class="album bg-light">
        <!------------------Truyện mới cập nhật------------------>
        @include('pages.truyenmoi')

        
        <!------------------Truyện FULL------------------>
        @include('pages.truyenfull')
        
        
    </div>

@endsection