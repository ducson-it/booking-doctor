@extends('layouts.layout_admin_master')

@section('content')
    <div class="title">
        <h1>Đăng ký user bệnh nhân</h1>
    </div>
    @if (session('msg'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('msg') }}
        </div>
    @endif
    <div class="container">
        <form action="{{ route('admin.patient.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label class="form-label">Tên bệnh nhân</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                    placeholder="Tên bệnh nhân">
                @error('name')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Email đăng nhập</label>
                <input type="text" name="email" class="form-control" value="{{ old('email') }}"
                    placeholder="Email bệnh nhân">
                @error('email')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="text" name="password" class="form-control" value="{{ old('password') }}"
                    placeholder="Nhập password">
                @error('password')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>

            <input type="hidden" name="role" class="form-control" value="3">

            {{-- <div class="mb-3">
                <div>
                    <label for="formFile" class="form-label">Level</label>
                </div>
                <select class="form-select" name="select">
                    <option value="thac si">Thạc sĩ</option>
                    <option value="tien si">Tiến sĩ</option>
                    <option value="giao su">Giáo sư</option>
                </select>
            </div> --}}
            {{-- Teamplate admin nayf em laasy owr ddaau z? em lay tren mang anh oi. vào trang mạng đó a xem e cũng k rõ. để em xem --}}
            {{-- <div class="mb-3">
                <label class="form-label">Year of birth</label>
                <input type="text" name="yob" class="form-control" value="{{ $doctor->user->yob }}"
                    placeholder="Year of birth">
                @error('yob')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Phone</label>
                <input class="form-control" name="phoneuser" value="{{ $doctor->user->phone }}" type="text">
                @error('phoneuser')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <img src="{{ asset('img/') }}" alt="">
            </div> --}}
            {{-- <div class="mb-3">
                <label for="formFile" class="form-label">Image</label>
                <input class="form-control" name="image" type="file">
                @error('imageuser')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div> --}}
            {{-- <div class="row">
                <div class="col-6">
                    <label for="formFile" class="form-label">Gender</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="male"
                            {{ $doctor->user->gender == 'male' ? 'checked' : '' }} name="gender" id="gender1">
                        <label class="form-check-label" for="gender1">
                            Male
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="female" name="gender"
                            {{ $doctor->user->gender == 'female' ? 'checked' : '' }} id="gender2">
                        <label class="form-check-label" for="gender2">
                            Female
                        </label>
                    </div>
                    @error('gender')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div> --}}
                {{-- <div class="col-6">
                    <div>
                        <label for="formFile" class="form-label">Level</label>
                    </div>
                    <select class="form-select" name="select">
                        <option value="thac si" {{($doctor->level == 'thac si')? 'selected' : ''}}>Thạc sĩ</option>
                        <option value="tien si" {{($doctor->level == 'tien si')? 'selected' : ''}}>Tiến sĩ</option>
                        <option value="giao su" {{($doctor->level == 'giao su')? 'selected' : ''}}>Giáo sư</option>
                    </select>
                </div> --}}
            </div>
            {{-- <div class="mb-3">
                <div class="form-floating">
                    <label for="formFile" class="form-label">Description</label>
                    <textarea class="form-control" name="description" placeholder="Leave a comment here" id="floatingTextarea">{{ $doctor->user->description }}</textarea>
                    @error('description')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div> --}}
            <button type="submit" class="btn btn-primary">Đăng ký</button>
        </form>
    </div>
@endsection
