@extends('layouts.layout_admin_master')

@section('content')
    @if (session('msg'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('msg') }}
        </div>
    @endif
    <h1>Tạo gói</h1>
    <form action="{{ route('admin.package.update', $package->id) }}" method="Post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="tab-content pt-3">
            <form class="form" novalidate="">
                <div class="row">
                    <div class="col">
                        <div class="row">
                            <div class="col">
                                <div class="form-group"> <label>Name</label> <input class="form-control" type="text"
                                        value="{{ $package->name }}" placeholder="title" name="name">
                                </div>
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group"> <label>price</label> <input class="form-control" type="text"
                                        value="{{ $package->price }}" name="price" placeholder="subtitle">
                                </div>
                            </div>
                            @error('price')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group"> <label>price</label> <input class="form-control" type="text"
                                        value="{{ $package->count }}" name="count" placeholder="subtitle">
                                </div>
                            </div>
                            @error('count')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="row" style="width: 200px">
                            <img src="{{ asset('img/'.$package->image) }}" alt="">
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
                                <div class="form-group"> <label>Description</label>
                                    <textarea class="form-control ckeditor" name="description" id="ckeditor1" rows="5">
                                        {{ $package->description }}
                            </textarea>
                                </div>
                                @error('description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="package_id" value="{{ $package->id }}">
                <button type="submit" class="btn btn-primary">Tạo gói</button>
            </form>
        </div>
    @endsection
