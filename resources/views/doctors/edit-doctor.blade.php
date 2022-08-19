@extends('layouts.layout_doctor_master')

@section('content')
    <h1>Cập nhật thông tin bác sĩ</h1>
    @if (session('msg'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('msg') }}
        </div>
    @endif
    <div class="container">
        <form action="{{ route('doctor.profile.update') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="tab-content pt-3">
                <form class="form" novalidate="">
                    <div class="row">
                        <div class="col">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group"> <label>Username</label> <input class="form-control"
                                            type="text" name="name" value="{{ Auth::user()->name }}">
                                    </div>
                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group"> <label>Email</label> <input class="form-control" type="text"
                                            name="email" placeholder="user@example.com" value="{{ Auth::user()->email }}">
                                    </div>
                                </div>
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group"> <label>Address</label> <input class="form-control"
                                            type="text" name="address" placeholder="John Smith"
                                            value="{{ Auth::user()->address }}">
                                    </div>
                                    @error('address')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <div class="form-group"> <label>Phone</label> <input class="form-control" type="text"
                                            name="phone" placeholder="Phone" value="{{ Auth::user()->phone }}">
                                    </div>
                                    @error('phone')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div style="width: 200px; height:200px">
                                    <img style="width: 100%" src="{{ asset('img/' . Auth::user()->image) }}" alt="ok">
                                </div>
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
                                        <textarea class="form-control ckeditor" name="description" id="ckeditor1" rows="5">
                                    {{ Auth::user()->description }}
                                    </textarea>
                                    </div>
                                    @error('description')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div>
                                    <label for="formFile" class="form-label">Level</label>
                                </div>
                                <select class="form-select" name="select">
                                    <option value="thac si" {{ Auth::user()->level == 'thac si' ? 'selected' : '' }}>Thạc sĩ
                                    </option>
                                    <option value="tien si" {{ Auth::user()->level == 'tien si' ? 'selected' : '' }}>Tiến sĩ
                                    </option>
                                    <option value="giao su" {{ Auth::user()->level == 'giao su' ? 'selected' : '' }}>Giáo sư
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        @endsection
