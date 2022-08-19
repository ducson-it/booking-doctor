@extends('layouts.layout_admin_master')

@section('content')
@if (session('msg'))
<div class="alert alert-success mb-1 mt-1">
    {{ session('msg') }}
</div>
@endif
<h1>Quản lý bệnh nhân</h1>
<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th width='20%'>Image</th>
            <th>Name</th>
            <th>Email</th>
            {{-- <th>Level</th> --}}
            {{-- <th>YOB</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Level</th> --}}
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @php($stt = 1)
        @foreach ($listPatient as $patient)
        <tr>
            <th>{{ $stt++ }}</th>
            <td><img width="100px" src="{{ asset('img/ducson.jpg') }}" alt=""></td>
            <td>{{ $patient->name }}</td>
            <td>{{ $patient->email }}</td>
            {{-- <td>{{ $doctor->level }}</td> --}}
            {{-- <td>{{ $doctor->yob }}</td>
            <td>{{ $doctor->email }}</td>
            <td>{{ $doctor->phone }}</td>
            <td>{{ $doctor->address }}</td> --}}
            <td>
                <form action="{{ route('admin.patient.destroy', $patient->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Xóa</button>
                </form>
                <form action="{{ route('admin.patient.edit', $patient->id) }}" method="get">
                    @csrf
                    <button type="submit" class="btn btn-primary">Edit</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection