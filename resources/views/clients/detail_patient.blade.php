@extends('layouts.layout_client_master')

@section('content')
    <div class="container">
        <h1 class="text-center">Thông tin đặt lịch của tôi</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Bác sĩ</th>
                    <th scope="col">Ca đặt</th>
                    <th scope="col">Ngày đặt</th>
                    <th scope="col">Trạng thái</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($listBook as $key => $list)
                <tr>
                        <th>{{ $key+1 }}</th>
                        <td>{{ $list->user->name }}</td>
                        <td>{{ $list->shift->name }}</td>
                        <td>{{ $list->date }}</td>
                        <td class="status">
                            @if ($list->status == 1)
                                <button id="status-booking" disabled value="{{ $list->status }}" class="btn btn-warning">Pending</button>
                            @elseif ($list->status == 2)
                                <button id="status-booking" disabled value="{{ $list->status }}" class="btn btn-success">Confirmed</button>
                            @elseif ($list->status == 3)
                                <button id="status-booking" disabled value="{{ $list->status }}" class="btn btn-primary">Successed</button>
                            @endif
                        </td>
                        <td><a href="{{ route('deleteBooking', $list->id) }}" class="btn btn-danger">Cancel</a></td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
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
