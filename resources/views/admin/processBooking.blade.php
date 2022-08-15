@extends('layouts.layout_admin_master')

@section('content')
    <h1 class="text-center">Bệnh nhân đặt lịch</h1>
    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button"
                role="tab" aria-controls="nav-home" aria-selected="true">Chưa xử lý</button>
            <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button"
                role="tab" aria-controls="nav-profile" aria-selected="false">Đã xử lý</button>
            <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button"
                role="tab" aria-controls="nav-contact" aria-selected="false">Đã hoàn thành</button>
            <button class="nav-link" id="nav-about-tab" data-bs-toggle="tab" data-bs-target="#nav-about" type="button"
                role="tab" aria-controls="nav-contact" aria-selected="false">Đã hủy</button>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Bệnh nhân</th>
                        <th scope="col">Bác sĩ</th>
                        <th scope="col">Ca đặt</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Ngày đặt</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($listBook as $key => $list)
                        <tr>
                            <th>{{ $key + 1 }}</th>
                            <td>{{ Auth::user()->name }}</td>
                            <td>{{ $list->user->name }}</td>
                            <td>{{ $list->shift->name }}</td>
                            <td>{{ $list->user->phone }}</td>
                            <td>{{ $list->date }}</td>
                            <td class="status">
                                @if ($list->status == 1)
                                    <button id="status-booking" disabled value="{{ $list->status }}"
                                        class="btn btn-warning">Pending</button>
                                @elseif ($list->status == 2)
                                    <button id="status-booking" disabled value="{{ $list->status }}"
                                        class="btn btn-success">Confirmed</button>
                                @elseif ($list->status == 3)
                                    <button id="status-booking" disabled value="{{ $list->status }}"
                                        class="btn btn-primary">Successed</button>
                                @elseif ($list->status == 4)
                                    <button id="status-booking" disabled value="{{ $list->status }}"
                                        class="btn btn-danger">Successed</button>
                                @endif
                            </td>
                            <td>
                                <a class="btn btn-primary" href="{{ route('admin.confirm', $list->id) }}"
                                    onclick="confirm('Did you call for patient?')">Confirm</a>
                                <a class="btn btn-danger" href="{{ route('admin.cancel', $list->id) }}">Cancel</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Bác sĩ</th>
                        <th scope="col">Ca đặt</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Ngày đặt</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($listBook2 as $key => $list)
                        <tr>
                            <th>{{ $key + 1 }}</th>
                            <td>{{ $list->user->name }}</td>
                            <td>{{ $list->shift->name }}</td>
                            <td>{{ $list->user->phone }}</td>
                            <td>{{ $list->date }}</td>
                            <td class="status">
                                <button id="status-booking" disabled value="{{ $list->status }}"
                                    class="btn btn-success">Confirmed</button>
                            </td>
                            <td><a href="" class="btn btn-danger">Cancel</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab" tabindex="0">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Bác sĩ</th>
                        <th scope="col">Ca đặt</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Ngày đặt</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($listBook3 as $key => $list)
                        <tr>
                            <th>{{ $key + 1 }}</th>
                            <td>{{ $list->user->name }}</td>
                            <td>{{ $list->shift->name }}</td>
                            <td>{{ $list->user->phone }}</td>
                            <td>{{ $list->date }}</td>
                            <td class="status">
                                <button id="status-booking" disabled value="{{ $list->status }}"
                                    class="btn btn-primary">Successed</button>
                            </td>
                            <td><a href="" class="btn btn-danger">Cancel</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="tab-pane fade" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab" tabindex="0">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Bác sĩ</th>
                        <th scope="col">Ca đặt</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Ngày đặt</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($listBook4 as $key => $list)
                        <tr>
                            <th>{{ $key + 1 }}</th>
                            <td>{{ $list->user->name }}</td>
                            <td>{{ $list->shift->name }}</td>
                            <td>{{ $list->user->phone }}</td>
                            <td>{{ $list->date }}</td>
                            <td class="status">

                                <button id="status-booking" disabled value="{{ $list->status }}"
                                    class="btn btn-danger">Cancel</button>

                            </td>
                            <td><a href="" class="btn btn-primary">Return</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
