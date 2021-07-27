@extends('layouts.app')

@section('content')

@include('layouts.nav')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Liệt kê truyện</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   <table class="table table-striped table-responsive">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tên truyện</th>
                            <th scope="col">Hình ảnh</th>
                            <th scope="col">Tác giả</th>
                            <th scope="col">Slug truyện</th>
                            <th scope="col">Từ khóa</th>
                            {{-- <th scope="col">Tóm tắt</th> --}}
                            <th scope="col">Danh mục truyện</th>
                            <th scope="col">Thể loại truyện</th>
                            <th scope="col">Views</th>
                            <th scope="col">Ngày tạo</th>
                            <th scope="col">Ngày update</th>
                            <th scope="col">Kích hoạt</th>
                            <th scope="col">Truyện nổi bật</th>
                            <th scope="col">Check Full</th>
                            <th scope="col">Quản lý</th>
                            
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($list_truyen as $key => $truyen)
                            <tr>
                                <th scope="row">{{$key}}</th>
                                <td>{{$truyen->tentruyen}}</td>
                                <td><img src="{{asset('public/uploads/truyen/'.$truyen->hinhanh)}}" height="200" width="180"></td>
                                <td>{{$truyen->tacgia}}</td>
                                <td>{{$truyen->slug_truyen}}</td>
                                <td>{{$truyen->tukhoa}}</td>
                                {{-- <td>{{$truyen->tomtat}}</td> --}}
                                <td>{{$truyen->danhmuctruyen->tendanhmuc}}</td>
                                <td>{{$truyen->theloai->tentheloai}}</td>
                                <td>{{$truyen->views}}</td>
                                <td>
                                    @if ($truyen->created_at != '')
                                    <p>{{$truyen->created_at}}</p>
                                    <p>{{$truyen->created_at->diffForHumans()}}</p>
                                    @endif
                                </td>
                                <td>
                                    @if ($truyen->updated_at != '')
                                    <p>{{$truyen->updated_at}}</p>
                                    <p>{{$truyen->updated_at->diffForHumans()}}</p>
                                    @endif
                                </td>
                                <td>
                                    @if ($truyen->kichhoat==0)
                                        <span class="text text-success">Kích hoạt</span>
                                    @else
                                        <span class="text text-danger">Không kích hoạt</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($truyen->truyennoibat==0)
                                        <span class="text text-success">Mới</span>
                                    @elseif ($truyen->truyennoibat==1)
                                        <span class="text text-danger">Hot</span>
                                    @else
                                        <span class="text text-primary">Xem nhiều</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($truyen->checkfull==0)
                                        <span class="text text-success">Đang cập nhật</span>
                                    @else
                                        <span class="text text-danger">Đã FULL</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('truyen.edit',[$truyen->id])}}" class="btn btn-primary">Edit</a>
                                    <form action="{{route('truyen.destroy', [$truyen->id])}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button onclick="return confirm('Bạn muốn xóa truyện này không?');" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                    {{$list_truyen->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
