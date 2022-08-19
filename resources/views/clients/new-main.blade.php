@extends('layouts.layout_client_master')

@section('banner')
    <div class="banner">
        <img class="w-100 d-block" src="{{ asset('img/bookingcare-cover-4.jpg') }}" />
    </div>
    <div class="search text-center">
        <h1>Nền tảng y tế <br /><b>chăm sóc sức khỏe toàn diện</b></h1>
        <form action="{{ route('ajax.searchDoctor') }}" class="d-flex justify-content-center input-search" role="search">
            <input class="form-control me-2" name="searchDoctor" id="searchDoctor" type="search" placeholder="Search"
                aria-label="Search" />
        </form>
    </div>
@endsection

@section('content my-5')
    <div class="container">
        <h1 class="text-center fs-1">{{ $details->title }}</h1>
        <p>{{ $details->created_at }}</p>
        <h3>{{ $details->subtitle }}</h3>
        <p>{!! $details->content !!}</p>
    </div>
@endsection
