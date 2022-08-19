@extends('layouts.layout_doctor_master')

@section('content')
    <h1>Chọn lịch làm việc</h1>
    <div class="col-12 m-3  ">
        <label for="datePicker">Ca còn hiện tại</label>
        <input type="date" id="datePicker" class="form-control date-picker" name="setTodaysDate" min="2005-01-01">
    </div>
    <div class="checkbox-book d-flex flex-wrap justify-content-between">
        @foreach ($listShift as $key => $list)
            <div class="checkbox-item p-2">
                <input type="checkbox" name="chooseShift" id="checkboxOne{{ $key }}" value="{{ $list->id }}">
                <label for="checkboxOne{{ $key }}">{{ $list->name }}</label>
            </div>
        @endforeach
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
                        count += 1;
                    }
                    quantityChecked.innerHTML = count;
                }
            })
        });
    </script>
@endpush
