@extends('layouts.layout_doctor_master')

@section('content')
    <h1>Nhập file chẩn đoán</h1>
    <form action="{{ route('doctor.create.diagnose', $id) }}" method="Post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <input class="form-control" name="excel" type="file" id="formFile">
        </div>
        @error('excel')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <button type="submit" class="btn btn-primary">Gửi</button>
    </form>
@endsection
