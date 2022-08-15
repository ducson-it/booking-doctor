@extends('layouts.layout_doctor_master')

@section('content')
    <h1>Chọn lịch làm việc</h1>
    <button></button>
    <div class="col-12 m-3  ">
        <label for="datePicker">Ca còn hiện tại</label>
        <input type="date" id="datePicker"
            class="form-control date-picker" name="setTodaysDate" min="2005-01-01">
    </div>
    <table class="table">
        <thead>
            <tr>
                {{-- <th scope="col"><input type="checkbox" id="checkedAll"></th> --}}
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($listShift as $key => $list)
                <tr>
                    {{-- <th scope="row"><input type="checkbox" name="checkItem[]" id="checkItem"></th> --}}
                    <th scope="row">{{ $key++ }}</th>
                    <th scope="row">{{ $list->name }}</th>
                    <td scope="row"></td>
                    <td scope="row"><a href="" class="btn btn-primary">Thêm</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
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
