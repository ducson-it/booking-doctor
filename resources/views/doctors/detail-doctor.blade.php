@extends('layouts.layout_doctor_master')

@section('content')
    <div class="container">
        <div class="row text-center">
            <h3 class="text-center">Thông tin cá nhân</h3>
            <div style="width: 200px; margin-left:450px;">
                <img src="{{ asset('img/'.Auth::user()->image) }}" width="100%" alt="">
            </div>
        </div>
            <div class="des-patient text-center">
                <p>Name: {{ Auth::user()->name }}</p>
                <p>Email: {{ Auth::user()->email }}</p>
                <p>Phone: {{ Auth::user()->phone }}</p>
                <p>Address: {{ Auth::user()->address }}</p>
                <p>Level: {{ Auth::user()->level }}</p>
                <a href="{{ route('doctor.profile.edit', Auth::user()->id) }}" class="d-block my-2 btn btn-warning">Sửa thông tin</a>
            </div>
    </div>
@endsection
