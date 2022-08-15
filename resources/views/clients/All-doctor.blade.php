@extends('layouts.layout_client_master')

@section('content')
    <div class="container">
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
                    <div class="row d-flex p-2">
                        @foreach ($allDoctor as $key => $doctor)
                            <div class="itemDoctor col-4">
                                <label for="doctor-package{{ $key }}"><img width="100%"
                                    src="{{ asset('img/bookingcare-cover-4.jpg') }}" alt="">
                                <h4 class="text-center">{{ $doctor->name }}</h4>
                            </label>
                            <input type="checkbox" name="doctor-package" id='doctor-package{{ $key }}'>
                            </div>
                        @endforeach
                    </div>
                    <button type="submit" class="btn btn-primary">Tiếp tục</button>
                </div>
            </section>
        </div>
    </div>
@endsection
