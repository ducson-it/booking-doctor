@extends('layouts.layout_admin_master')

@section('content')
    <!-- Content Row -->
    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <a href="{{ route('admin.booking') }}">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Bệnh nhân đặt lịch</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $count1 }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
                </a>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <a href="{{ route('admin.booking') }}">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                 Bệnh nhân đã xác nhận</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $count2 }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <a href="{{ route('admin.booking') }}">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    Đã khám xong
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $count3 }}</div>
                                    </div>
                                    <div class="col">
                                        <div class="progress progress-sm mr-2">
                                            <div class="progress-bar bg-info" role="progressbar" style="width: 50%"
                                                aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <a href="{{ route('admin.booking') }}">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Bệnh nhân hủy lịch khám</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $count4 }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
                </a>
            </div>
        </div>
    </div>

    <!-- Content Row -->
    <h1>Danh sách</h1>
    <div class="row">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Bác sĩ</th>
                    <th scope="col">Ca đặt</th>
                    <th scope="col">Ngày đặt</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Trạng thái</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($listBook as $key => $list)
                    <tr>
                        <th>{{ $key + 1 }}</th>
                        <td>{{ $list->user->name }}</td>
                        <td>{{ $list->shift->name }}</td>
                        <td>{{ $list->user->phone }}</td>
                        <td>{{ $list->date }}</td>
                        <td class="status">
                            @if ($list->status == 1)
                                <button id="status-booking" disabled value="{{ $list->status }}"
                                    class="btn btn-warning">Pending</button>
                            @elseif ($list->status == 2)
                                <button id="status-booking"  disabled value="{{ $list->status }}"
                                    class="btn btn-success">Confirmed</button>
                            @elseif ($list->status == 3)
                                <button id="status-booking" disabled value="{{ $list->status }}"
                                    class="btn btn-primary">Successed</button>
                            @endif
                        </td>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
