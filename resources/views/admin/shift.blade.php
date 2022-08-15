@extends('layouts.layout_admin_master')
@section('content')
    <h2>Danh sách ca</h2>
    <div class="row">
        <form action="{{ route('admin.delete-shift') }}" method="post">
            <button type="submit" class="col-1 btn btn-danger justify-items-start">Xóa (<span
                    id="quantityChecked">0</span>)</button>
            @csrf
            <div class="checkbox-book d-flex flex-wrap justify-content-evenly m-3">
                @php
                    $stt = 1;
                @endphp
                <table class="table">
                    <thead>
                        <tr>
                            <th><input type="checkbox" id="checkedAll"></th>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Status</th>
                            <th scope="col">restore</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($listShift as $shift)
                            <tr>
                                <td><input @php echo $shift->trashed() ? 'disabled' : '' ; @endphp type="checkbox" name="checkItem[]" value="{{ $shift->id }}"
                                        id="checkItem">
                                </td>
                                <td scope="col">{{ $stt++ }}</td>
                                <td scope="col">{{ $shift->name }}</td>
                                @if ($shift->trashed())
                                    <td scope="col">
                                        <p class="btn btn-danger">Đã xóa</p>
                                    </td>
                                @else
                                    <td scope="col">
                                        <p class="btn btn-success">Chưa xóa</p>
                                    </td>
                                @endif
                                <td scope="col">
                                    @if ($shift->trashed())
                                        <a href="{{ route('restoreShift', $shift->id) }}" class="btn btn-primary"> Khôi phục </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </form>
    </div>
@endsection

@push('js')
    <script>
        var checkedAll = document.getElementById("checkedAll");
        var checkItem = document.querySelectorAll('#checkItem');
        var quantityChecked = document.getElementById('quantityChecked');
        var count = 0;

        checkedAll.addEventListener('click', () => {
            checkItem.forEach(e => {
                if (checkedAll.checked) {
                    e.checked = true;
                } else {
                    e.checked = false;
                }
            });
        })

        checkItem.forEach(e => {
            e.addEventListener('change', () => {
                for (let index = 0; index < checkItem.length; index++) {
                    if (checkItem[index].checked) {
                        count+=1;
                    }
                    quantityChecked.innerHTML = count;
                }
            })
        });
    </script>
@endpush
