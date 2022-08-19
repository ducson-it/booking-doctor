@extends('layouts.layout_client_master')

@section('content')
    <div class="container my-5">
        <div class="row m-5">
            <h1>Thông tin của tôi</h1>
        </div>
        <div class="row">
            <div class="col-8">
                <h3 class="text-center">Đặt lịch</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Bác sĩ</th>
                            <th scope="col">Ca đặt</th>
                            <th scope="col">Ngày đặt</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Attach</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($listBook as $key => $list)
                            <tr>
                                <th>{{ $key + 1 }}</th>
                                <td>{{ $list->user->name }}</td>
                                <td>{{ $list->shift->name }}</td>
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
                                    @endif
                                </td>
                                <td>
                                    @if ($list->status == 3)
                                        <a href="{{ route('doctor.download.diagnose', $list->id) }}">
                                            <button
                                                class="button border items- center text-gray-700 dark:border-dark-5 dark:text-gray-300 hidden sm:flex">
                                                Kết quả
                                            </button>
                                        </a>
                                    @endif
                                </td>
                                <td><a href="{{ route('deleteBooking', $list->id) }}" class="btn btn-danger">Cancel</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-4">
                <h3 class="text-center">Cá nhân</h3>
                <div class="avt-patient">
                    <img src="{{ asset('img/090430-uu-dai-di-kham-mediplus.jpg') }}" width="100%" alt="">
                </div>
                <div class="des-patient ">
                    <a href="{{ route('edit-profile', Auth::user()->id) }}" class="d-block my-2 btn btn-warning">Sửa thông
                        tin</a>
                    <p>Name: {{ Auth::user()->name }}</p>
                    <p>Email: {{ Auth::user()->email }}</p>
                    <p>Phone: {{ Auth::user()->phone }}</p>
                    <p>Address: {{ Auth::user()->phone }}</p>
                    <a href="" class="d-block btn btn-primary w-50">Kiểm tra gói của bạn</a>
                </div>

            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        var checkboxs = document.getElementsByName('choose-shift');
        checkboxs.forEach(item => {
            item.addEventListener('click', (e) => {
                let currentState = e.target.checked;

                checkboxs.forEach(checbox => {
                    checbox.checked = false;
                })

                e.target.checked = currentState;
            })
        });
    </script>
@endpush
