@extends('layouts.layout_client_master')

@section('banner')
    <div class="banner">
        <img class="w-100 d-block" src="{{ asset('img/bookingcare-cover-4.jpg') }}" />
    </div>
    <div class="search text-center">
        <h1>Nền tảng y tế <br /><b>chăm sóc sức khỏe toàn diện</b></h1>
        <form action="{{ route('ajax.searchDoctor') }}" class="d-flex justify-content-center input-search" role="search">
            <input class="form-control me-2" name="searchDoctor" id="searchDoctor" type="search" placeholder="Search"
                aria-label="Search" />
        </form>
    </div>
@endsection

@section('content')
    <div class="container px-lg-5 mt-4 check-shift">
        <div class="row">
            <h3 class="mt-4">Check shift availability</h3>
            <div class="col-lg-12 bg-white shadow p-4">
                <form action="{{ route('search.schedule') }}" method="GET">
                    @csrf
                    <div class="row align-items-end">
                        <div class="col-lg-5 mb-3">
                            <label class="form-label fw-bold">Date</label>
                            <input type="date" class="form-control shadow-none" name="dateSchedule" id="" />
                        </div>
                        <div class="col-lg-5 mb-3">
                            <label class="form-label fw-bold">Hour</label>
                            <select class="form-select form-select-md" name="selectSchedule" aria-label=".form-select-lg example">
                                <option>Open this select menu</option>
                                @foreach ($allShift as $shift)
                                    <option value="{{ $shift->id }}">{{ $shift->name }}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="col-lg-2 mb-3">
                            <button type="submit" class="btn btn-outline-primary w-100">
                                Find
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        {{-- buy package --}}
        <section id="icon-boxes" class="icon-boxes">
            <div class="container">

                <div class="row">
                    @foreach ($allPackage as $package)
                        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up">
                            <div class="icon-box">
                                <div class="icon"><i class="fa-solid fa-hand-holding-heart"></i></div>
                                <h4 class="title"><a href="">{{ $package->name }}</a></h4>
                                <p class="description">{{ $package->description }}</p>
                                <a href="{{ route('package', $package->id) }}" class="btn btn-success my-4">Mua ngay</a>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </section>
        {{-- end buy package --}}
        <!-- doctor -->
        <div class="container-fluid bg-white">
            <div class="container py-5">
                <div class="d-flex justify-content-between">
                    <h3>Bác sĩ</h3>
                    <a href=""><button class="border p-2 font-1">Xem thêm</button></a>
                </div>
                <div class="swiper mySwiper four py-3">
                    <div class="swiper-wrapper">
                        @foreach ($allDoctor as $doctor)
                            <a href="{{ route('detailDoctor', $doctor->id) }}"
                                class="swiper-slide d-flex flex-column border border-primary pb-5">
                                <div class="p-2">
                                    <img src="{{ asset('img/' . $doctor->image) }}" alt="">
                                </div>
                                <h5 class="font1">{{ $doctor->name }}</h5>
                                <h4 class="font2">{{ $doctor->level }}</h4>
                            </a>
                        @endforeach
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>

            </div>
        </div>
        <!-- Post -->
        <div class="container  py-5">
            <div class="d-flex justify-content-between">
                <h3>Top cẩm nang hay</h3>
                <a href=""><button class="border p-2 font-1">Xem thêm</button></a>
            </div>
            <div #swiperRef="" class="swiper mySwiper two">
                <div class="swiper-wrapper">
                    @foreach ($allNew as $new)
                        <a href="{{ route('newMain', $new->id) }}">
                            <div class="swiper-slide">
                                <div class="row">
                                    <img src="{{ asset('img/' . $new->image) }}" alt="" />
                                    <h3 class="font1 text-start my-2">
                                        {{ $new->title }}
                                    </h3>
                                    <p class="font2 text-start">
                                        {{ $new->subtitle }}
                                    </p>
                                    <a class="text-decoration-none font1 text-start" href="">Xem chi tiết <i
                                            class="bi bi-chevron-right fs-6"></i></a>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    @endsection

    @push('js')
        <script>
            var today = new Date().toISOString().split('T')[0];
            document.getElementsByName("setTodaysDate")[0].setAttribute('min', today);
        </script>
    @endpush
