@extends('layouts.layout_client_master')

@section('content')
<div class="container-fluid px-lg-5 mt-4 check-shift">
    <div class="row">
      <h5 class="mt-4 text-center">Check shift availability</h5>
      <div class="col-lg-12 bg-white shadow p-4">
        <form action="">
          <div class="row align-items-end">
            <div class="col-lg-3 mb-3">
              <label class="form-label fw-bold">Date</label>
              <input
                type="date"
                class="form-control shadow-none"
                name=""
                id=""
              />
            </div>
            <div class="col-lg-3 mb-3">
              <label class="form-label fw-bold">Time</label>
              <select
                class="form-select form-select-md"
                aria-label=".form-select-lg example"
              >
                <option selected>Facility</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
            </div>
            <div class="col-lg-3 mb-3">
              <label class="form-label fw-bold">Hour</label>
              <select
                class="form-select form-select-md"
                aria-label=".form-select-lg example"
              >
                <option selected>Open this select menu</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
            </div>
            <div class="col-lg-3 mb-3">
              <button type="submit" class="btn btn-outline-primary w-100">
                Find
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
    <!-- Post -->
    <div class="container  py-4">
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
                        <a class="text-decoration-none font1 text-start" href="">Xem chi chiết <i
                                class="bi bi-chevron-right fs-6"></i></a>
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
                        <a class="text-decoration-none font1 text-start" href="">Xem chi chiết <i
                                class="bi bi-chevron-right fs-6"></i></a>
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
                        <a class="text-decoration-none font1 text-start" href="">Xem chi chiết <i
                                class="bi bi-chevron-right fs-6"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- facility -->
    <div class="container-fluid bg-light">
        <div class="container py-5">
            <div class="d-flex justify-content-between">
                <h3>Cơ sở y tế</h3>
                <a href=""><button class="border p-2 font-1">Xem thêm</button></a>
            </div>
            <div class="swiper mySwiper three py-3">
                <div class="swiper-wrapper">
                    <div class="swiper-slide d-flex flex-column">
                        <img src="img/090430-uu-dai-di-kham-mediplus.jpg" alt="">
                        <h3 class="text-secondary py-2 font2">Bệnh viện Hữu nghị Việt Đức</h3>
                    </div>
                    <div class="swiper-slide d-flex flex-column">
                        <img src="img/090430-uu-dai-di-kham-mediplus.jpg" alt="">
                        <h3 class="text-secondary py-2 font2">Bệnh viện Hữu nghị Việt Đức</h3>
                    </div>
                    <div class="swiper-slide d-flex flex-column">
                        <img src="img/090430-uu-dai-di-kham-mediplus.jpg" alt="">
                        <h3 class="text-secondary py-2 font2">Bệnh viện Hữu nghị Việt Đức</h3>
                    </div>
                    <div class="swiper-slide d-flex flex-column">
                        <img src="img/090430-uu-dai-di-kham-mediplus.jpg" alt="">
                        <h3 class="text-secondary py-2 font2">Bệnh viện Hữu nghị Việt Đức</h3>
                    </div>
                    <div class="swiper-slide d-flex flex-column">
                        <img src="img/090430-uu-dai-di-kham-mediplus.jpg" alt="">
                        <h3 class="text-secondary py-2 font2">Bệnh viện Hữu nghị Việt Đức</h3>
                    </div>
                    <div class="swiper-slide d-flex flex-column">
                        <img src="img/090430-uu-dai-di-kham-mediplus.jpg" alt="">
                        <h3 class="text-secondary py-2 font2">Bệnh viện Hữu nghị Việt Đức</h3>
                    </div>

                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>

        </div>
    </div>
    <!-- doctor -->
    <div class="container-fluid bg-white">
        <div class="container py-5">
            <div class="d-flex justify-content-between">
                <h3>Bác sĩ</h3>
                <a href=""><button class="border p-2 font-1">Xem thêm</button></a>
            </div>
            <div class="swiper mySwiper four py-3">
                <div class="swiper-wrapper">
                    @foreach ($limitDoctor as $doctor)
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
@endsection
