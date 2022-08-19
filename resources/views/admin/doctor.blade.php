@extends('layouts.layout_admin_master')

@section('content')
    @if (session('msg'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('msg') }}
        </div>
    @endif
    <h1>Quản lý bác sĩ</h1>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th width='20%'>Image</th>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Phone</th>
                <th>Description</th>
                <th>Address</th>
                <th>Level</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @php($stt = 1)
            @foreach ($listDoctor as $doctor)
                <tr>
                    <th>{{ $stt++ }}</th>
                    <td><img width="100%" src="{{ asset('img/ducson.jpg') }}" alt=""></td>
                    <td>{{ $doctor->name }}</td>
                    <td>{{ $doctor->email }}</td>
                    <td>{{ $doctor->password }}</td>
                    <td>{{ $doctor->phone }}</td>
                    <td>{{ $doctor->description }}</td>
                    <td>{{ $doctor->address }}</td>
                    <td>{{ $doctor->level }}</td>
                    <td>
                        <form action="{{ route('admin.doctor.edit', $doctor->id) }}" method="get">
                            @csrf
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </form>
                        {{-- <form action="{{ route('admin.doctor.destroy', $doctor->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form> --}}
                        @include('includes.delete', ['route'=> 'admin.doctor.destroy','id'=> $doctor->id]);
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
