@extends('layouts.layout_client_master')

@section('content')
    <div class="container">
        <div class="row">
            <h1 class="text-center py-lg-5">Setup package</h1>
        </div>
        <form action="{{ route('package.bill') }}" method="get">
            @csrf
            <div class="row">
                <div class="col-lg-4">
                    <div class="description">
                        <h3>Detail description package</h3>
                        <input type="hidden" name="packageId" value="{{ $package->id }}">
                        <p>
                            {{ $package->description }}
                        </p>
                    </div>
                </div>
                <div class="col-lg-8">
                    <section class="ftco-section">
                        <div class="row">
                            <h3 class="text-center">Lựa chọn bác sĩ</h3>
                            <div class="row doctor-package p-2">
                                @foreach ($allDoctor as $key => $doctor)
                                    <div class="itemDoctor row">
                                        <input type="checkbox" name="doctor_package"
                                            value="{{ $doctor->id }}" id='doctor-package{{ $key }}'>
                                        <label class="d-flex justify-content-between"
                                            for="doctor-package{{ $key }}">
                                            <div class="label-img">
                                                <img width="100%" src="{{ asset('img/bookingcare-cover-4.jpg') }}"
                                                    alt="">
                                            </div>
                                            <div class="label-text">
                                                <p class="text-center">{{ $doctor->name }}</p>
                                                <p class="text-center">{{ $doctor->description }}</p>
                                            </div>
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                            <button type="submit" class="btn btn-primary">Tiếp tục</button>
                        </div>
                    </section>
                </div>
        </form>
    </div>
    </form>
    </div>
@endsection

@push('js')
    <script>
        var checkboxs = document.getElementsByName('doctor-package');
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
        var checkboxs = document.getElementsByName('doctor_package');
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
