@extends('layouts.layout_admin_master')

@section('content')
    @if (session('msg'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('msg') }}
        </div>
    @endif
    <div class="title d-flex justify-content-between m-2">
        <h1>Danh sách bài viết</h1>
        <a href="{{ route('admin.new') }}" class="btn btn-primary">Thêm bài viết</a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th width='20%'>Hình ảnh</th>
                <th>Tiêu đề</th>
                <th>Tiêu đề phụ</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($listnew as $key => $list)
                <tr>
                    <th scope="row">{{ $key+1 }}</th>
                <td><img width='100%' src="{{ asset('img/' . $list->image) }}" alt="image-news"></td>
                <td>{{ $list->title }}</td>
                <td>{{ $list->subtitle }}</td>
                <td>
                    <a href="{{ route('admin.new.edit', $list->id) }}" class="btn btn-primary">Sửa</a>
                    <a href="{{ route('admin.new.delete', $list->id) }}" class="btn btn-danger">Xóa</a>
                </td>
                </tr>
            @endforeach
    </table>
@endsection
