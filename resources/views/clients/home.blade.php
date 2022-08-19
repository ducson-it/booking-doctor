@extends('layouts.layout_client_master')

@section('content')
<div class="container px-lg-5 mt-4 check-shift">
    <div class="row">
        <h3 class="mt-4">Check shift availability</h3>
        <div class="col-lg-12 bg-white shadow p-4">
            <form action="">
                <div class="row align-items-end">
                    <div class="col-lg-5 mb-3">
                        <label class="form-label fw-bold">Date</label>
                        <input type="date" class="form-control shadow-none" name="" id="" />
                    </div>
                    <div class="col-lg-5 mb-3">
                        <label class="form-label fw-bold">Hour</label>
                        <select class="form-select form-select-md" aria-label=".form-select-lg example">
                            <option selected>Open this select menu</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
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
                    <a href="{{ route('package', $package->id) }}" class="btn btn-success my-4">Buy Now</a>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section>

<div class="container">
    <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
        <div class="col">
            <div class="card mb-4 rounded-3 shadow-sm">
                <div class="card-header py-3">
                    <h4 class="my-0 fw-normal">Free</h4>
                </div>
                <div class="card-body">
                    <h1 class="card-title pricing-card-title">$0<small class="text-muted fw-light">/mo</small></h1>
                    <ul class="list-unstyled mt-3 mb-4">
                        <li>10 users included</li>
                        <li>2 GB of storage</li>
                        <li>Email support</li>
                        <li>Help center access</li>
                    </ul>
                    <button type="button" class="w-100 btn btn-lg btn-outline-primary">Sign up for free</button>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card mb-4 rounded-3 shadow-sm">
                <div class="card-header py-3">
                    <h4 class="my-0 fw-normal">Pro</h4>
                </div>
                <div class="card-body">
                    <h1 class="card-title pricing-card-title">$15<small class="text-muted fw-light">/mo</small></h1>
                    <ul class="list-unstyled mt-3 mb-4">
                        <li>20 users included</li>
                        <li>10 GB of storage</li>
                        <li>Priority email support</li>
                        <li>Help center access</li>
                    </ul>
                    <button type="button" class="w-100 btn btn-lg btn-primary">Get started</button>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card mb-4 rounded-3 shadow-sm border-primary">
                <div class="card-header py-3 text-bg-primary border-primary">
                    <h4 class="my-0 fw-normal">Enterprise</h4>
                </div>
                <div class="card-body">
                    <h1 class="card-title pricing-card-title">$29<small class="text-muted fw-light">/mo</small></h1>
                    <ul class="list-unstyled mt-3 mb-4">
                        <li>30 users included</li>
                        <li>15 GB of storage</li>
                        <li>Phone and email support</li>
                        <li>Help center access</li>
                    </ul>
                    <button type="button" class="w-100 btn btn-lg btn-primary">Contact us</button>
                </div>
            </div>
        </div>
    </div>
</div>
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
                <a href="{{ route('detailDoctor', $doctor->id) }}" class="swiper-slide d-flex flex-column border border-primary pb-5">
                    <div class="p-2">
                        <img src="img/090430-uu-dai-di-kham-mediplus.jpg" alt="">
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
    <div class="d-flex justify-content-between" style="margin-bottom:40px ;font-weight: bold;">
        <h3>Top cẩm nang hay</h3>
        <a href=""><button class="border p-2 font-1">Xem thêm</button></a>
    </div>
    <div #swiperRef="" class="swiper mySwiper two">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="row">
                    <img src="img/090430-uu-dai-di-kham-mediplus.jpg" alt="" />
                    <h3 class="font1 text-start my-2">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Aliquid, facere
                    </h3>
                    <p class="font2 text-start">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Aliquid, facere
                    </p>
                    <a class="text-decoration-none font1 text-start" href="">Xem chi tiết <i class="bi bi-chevron-right fs-6"></i></a>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="row">
                    <img src="img/090430-uu-dai-di-kham-mediplus.jpg" alt="" />
                    <h3 class="font1 text-start my-2">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Aliquid, facere
                    </h3>
                    <p class="font2 text-start">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Aliquid, facere
                    </p>
                    <a class="text-decoration-none font1 text-start" href="">Xem chi tiết <i class="bi bi-chevron-right fs-6"></i></a>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="row">
                    <img src="img/090430-uu-dai-di-kham-mediplus.jpg" alt="" />
                    <h3 class="font1 text-start my-2">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Aliquid, facere
                    </h3>
                    <p class="font2 text-start">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Aliquid, facere
                    </p>
                    <a class="text-decoration-none font1 text-start" href="">Xem chi tiết <i class="bi bi-chevron-right fs-6"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection