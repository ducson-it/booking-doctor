@extends('layouts.layout_doctor_master')

@section('content')
    <h1>Chọn lịch làm việc</h1>
    <form action="{{ route('doctor.create.shift') }}" method="post">
        @csrf
        <div class="col-12 m-3  ">
            <label for="datePicker">Ca còn hiện tại</label>
            <input type="date" id="datePicker" class="form-control date-picker" name="setTodaysDate" min="2005-01-01">
        </div>
        <div class="checkbox-book d-flex flex-wrap justify-content-between">
            <div id="load-shift">
                
            </div>
        </div>
        <button type="submit" class="btn btn-primary ml-3">Chọn lịch</button>
    </form>
@endsection

@push('js')
    <script src="{{ asset('js/javascript.js') }}"></script>
    <script>
        $("#datePicker").change(function() {
            $.ajax({
                type: 'POST',
                url: "{{ route('ajax.getSchedule') }}",
                data: {
                    selectDate: $("#datePicker").val(),
                    doctorId: '{{ Auth::user()->id }}'
                },
                success: function(html) {
                    $("#load-shift").html(html);
                },
            });
        });
    </script>
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
    <script>
        var today = new Date().toISOString().split('T')[0];
        document.getElementsByName("setTodaysDate")[0].setAttribute('min', today);
    </script>
@endpush
