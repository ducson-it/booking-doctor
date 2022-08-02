@extends('layouts.layout_admin_master')
@section('content')
<a href="{{ route('admins.add-shift') }}" class="m-3 btn btn-primary">Add shift</a>
<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Shift Name</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">1</th>
        <td>Mark</td>
        <td>
            <a href="" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
            <a href="" class="btn btn-primary">Edit</a>
        </td>
      </tr>
    </tbody>
  </table>
@endsection
