@extends('layouts.layout_admin_master')

@section('content')
    @if (session('msg'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('msg') }}
        </div>
    @endif
    <h1>Tạo bài viết</h1>
    <form action="{{ route('admin.new.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="tab-content pt-3">
            <form class="form" novalidate="">
                <div class="row">
                    <div class="col">
                        <div class="row">
                            <div class="col">
                                <div class="form-group"> <label>Tiêu đè</label> <input class="form-control" type="text"
                                        value="{{ old('title') }}" placeholder="title" name="title">
                                </div>
                                @error('title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group"> <label>Subtitle</label> <input class="form-control" type="text"
                                        value="{{ old('subtitle') }}" name="subtitle" placeholder="subtitle">
                                </div>
                            </div>
                            @error('subtitle')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="mb-3">
                                <input class="form-control" name="image" type="file" id="formFile">
                            </div>
                            @error('image')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <div class="form-group"> <label>About</label>
                                    <textarea class="form-control ckeditor" name="content" id="ckeditor1" rows="5">
                                        {{ old('content') }}
                            </textarea>
                                </div>
                                @error('content')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Tạo bài viết</button>
            </form>
        </div>
    @endsection
