@extends('layouts.layout_client_master')

@section('content')
    <div class="container text-center">
        <h1>Mua thành công</h1>
        <p>Vui lòng chọn ca bác sĩ <strong class="fs-4">{{ $doctor->name }}</strong></p>
        <a href="{{ route('detailDoctor', $doctor->id) }}" class="btn btn-primary">Chọn ca</a>
    </div>
@endsection
