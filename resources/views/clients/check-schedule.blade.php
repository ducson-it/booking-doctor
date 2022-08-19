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

@section('content')

    <div class="container my-5">
        <h1>Kết quả tìm kiếm</h1>
        @if (!empty($check))
            @foreach ($checks as $check)
                <div class="row ">
                    <div class="col-6">
                        <img src="{{ asset('img/' . $check->user->image) }}" alt="">
                        <p>Name: {{ $check->name }} </p>
                        <p>Level: {{ $check->level }} </p>
                    </div>
                </div>
            @endforeach
        @else

        <div class="row text-center">
            <h3> Không tìm thấy kết quả nào!!</h3>
        </div>

        @endif
    </div>

@endsection
