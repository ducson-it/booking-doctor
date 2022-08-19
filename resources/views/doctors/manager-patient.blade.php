@extends('layouts.layout_doctor_master')

@section('content')
    <h1>Quản lý bệnh nhân</h1>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Bệnh nhân</th>
                <th>Ca đặt</th>
                <th>Số điện thoại</th>
                <th>Ngày đặt</th>
                <th>Trạng thái</th>
                <th>Attach</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($listPatient as $key => $list)
                <tr>
                    <th>{{ $key }}</th>
                    <td>{{ $list->user->name }}</td>
                    <td>{{ $list->shift->name }}</td>
                    <td>{{ $list->user->phone }}</td>
                    <td>{{ $list->shift->date }}</td>
                    <td class="status">
                        @if ($list->status == 2)
                            <button id="status-booking" disabled value="{{ $list->status }}"
                                class="btn btn-success">Confirmed</button>
                        @elseif ($list->status == 3)
                            <button id="status-booking" disabled value="{{ $list->status }}"
                                class="btn btn-primary">Successed</button>
                        @endif
                    </td>
                    <td>
                        @if ($list->status == 3)
                            <a href="{{ route('doctor.download.diagnose', $list->id) }}">
                                <button class="button border items- center text-gray-700 dark:border-dark-5 dark:text-gray-300 hidden sm:flex">
                                    Kết quả
                                </button>
                            </a>
                        @endif
                    </td>
                    <td>
                        @if ($list->status == 2)
                            <a href="{{ route('doctor.diagnose.patient', $list->id) }}" id="status-booking"
                                value="{{ $list->status }}" class="btn btn-success">Chẩn đoán</a>
                        @endif
                        @if ($list->status == 3)
                            <a href="{{ route('doctor.update.diagnose', $list->id) }}" class="btn btn-primary">Cập nhật</a>
                        @endif
                        <a href="{{ route('doctor.delete.diagnose', $list->id) }}" class="btn btn-danger">Xóa</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
