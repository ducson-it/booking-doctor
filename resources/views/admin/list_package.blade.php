@extends('layouts.layout_admin_master')

@section('content')
    @if (session('msg'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('msg') }}
        </div>
    @endif
    <div class="title d-flex justify-content-between m-2">
        <h1>Danh sách gói</h1>
        <a href="{{ route('admin.package.create') }}" class="btn btn-primary">Thêm gói</a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th width='20%'>Hình ảnh</th>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Decription</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($listPackage as $key => $list)
                <tr>
                    <th scope="row">{{ $key+1 }}</th>
                <td><img width='100%' src="{{ asset('img/'. $list->image) }}" alt="image-news"></td>
                <td>{{ $list->name }}</td>
                <td>{{ $list->price }}</td>
                <td>{{ $list->count }}</td>
                <td>{{ $list->description }}</td>
                <td>
                    <form action="{{ route('admin.package.edit', $list->id) }}" method="get">
                        <button type="submit" class="btn btn-primary">Sửa</button>
                    </form>
                    <form action="{{ route('admin.package.destroy', $list->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Xóa</button>
                    </form>
                </td>
                </tr>
            @endforeach
    </table>
@endsection
