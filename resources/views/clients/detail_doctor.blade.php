@extends('layouts.layout_client_master')

@section('content')
<div class="container">
    <div class="row">
        <h1 class="text-center py-lg-5">Đặt lịch khám bệnh </h1>
    </div>
    <form action="{{ route('booking', $doctorId->id) }}" method="post">
        @csrf
        <div class="row">
            <div class="col-lg-6">
                <div class="d-flex justify-content-center img-doctor border border-1 text-center">
                    <img class="p-4" src="{{ asset('img/Bs-Nguyen-Ngoc-Phuong-Quynh-min.jpeg') }}" alt="">
                </div>
                <p style="font-size: 22px;color: red;padding-left: 70px;margin-top: 20px;"><strong style="font-weight: bold;"> Họ tên bác sĩ:</strong> {{ $doctorId->name }} </p>
                {{-- <p>AGE: {{ $doctorId->name }} </p> --}}
                <p style="font-size: 22px;color: red;padding-left: 70px;"><strong style="font-weight: bold;"> LEVEL:</strong> {{ $doctorId->level }} </p>
            </div>
            <div class="col-lg-6">
                <section class="ftco-section">
                    <input type="hidden" name="nameDoctor" value="{{ $doctorId->id }}">
                    <input type="hidden" name="namePatient" value="{{ Auth::user() ? Auth::user()->id : '' }}">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <div class="col-12 m-3  ">
                                <label style="font-size: 25px;" for="datePicker">Ca còn hiện tại</label>
                                <input type="date" id="datePicker" class="form-control date-picker" name="setTodaysDate" min="2005-01-01">
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div id="load-shift" class="d-flex justify-content-center">
                            <h1>Chọn ngày làm việc</h1>
                        </div>
                        <div class="row d-flex justify-content-center">
                            @if (count($shiftDoctor) > 0)
                            <button type="submit" class="btn btn-primary" id='btn-choose' style="width: 20%">
                                Chọn ca
                            </button>
                            @endif
                        </div>
                    </div>
                </section>
            </div>
            <div class="row" style="margin-bottom: 40px;">
                <div style="border: 1px black solid ; border-radius: 10px;" class="col-lg-12">
                    <h3 style="font-size: 22px;margin-top: 20px;">Description :</h3>
                    <p style="font-size: 19px;margin-top: 20px;font-style: italic;padding-left: 30px;">ssdzxcxzcxz
                        {{ $doctorId->description }}
                    </p>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@push('js')
<script>
    $("#datePicker").change(function() {
        $.ajax({
            type: 'POST',
            url: "{{ route('ajax.detailDoctor', $doctorId->id) }}",
            data: {
                selectDate: $("#datePicker").val(),
                doctorId: '{{ $doctorId->id }}'
            },
            success: function(html) {
                $("#load-shift").html(html);
            },
        });
    });
</script>
@endpush

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

@push('js')
<script>
    var today = new Date().toISOString().split('T')[0];
    document.getElementsByName("setTodaysDate")[0].setAttribute('min', today);
</script>
@endpush

@push('js')
<script>
    var checked = document.querySelectorAll('[name="choose-shift"]:checked');
    var btnChoose = document.querySelector('#btn-choose');
    btnChoose.addEventListener('click', (e) => {
        if (checked.length > 0) {
            e.preventDefault();
            return alert('Please, choose a shift');
        } else {
            return confirm('Are you sure choose a shift?')
        }
    })
</script>
@endpush