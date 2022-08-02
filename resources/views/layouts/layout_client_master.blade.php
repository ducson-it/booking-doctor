<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Gowun+Dodum&family=Poppins:wght@500;600&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css"
    />
    <link
      rel="stylesheet"
      href="https://unpkg.com/swiper@8/swiper-bundle.min.css"
    />
    <link rel="stylesheet" href="{{ asset('css/sb-admin-2.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <title>Document</title>
  </head>
  <body>
    <!-- Navbar -->
    <nav
      class="navbar navbar-expand-lg navbar-light bg-white px-lg-3 py-lg-2 shadow-sm sticky-top"
    >
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Hospital</a>
        <button
          class="navbar-toggler shadow-none"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active me-2" aria-current="page" href="#"
                >Home</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link me-2" href="#">Bác sĩ</a>
            </li>
            <li class="nav-item">
              <a class="nav-link me-2" href="#">Cơ sở khám bệnh</a>
            </li>
            <li class="nav-item">
              <a class="nav-link me-2" href="#">Bài viết</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Liên hệ</a>
            </li>
          </ul>
          <div class="d-flex">
            <button
              type="button"
              class="btn btn-outline-dark shadow-none me-lg-3 me-3"
              data-bs-toggle="modal"
              data-bs-target="#loginModal"
            >
              Login
            </button>
            <button
              type="button"
              class="btn btn-outline-dark shadow-none"
              data-bs-toggle="modal"
              data-bs-target="#RegisterModal"
            >
              Register
            </button>
          </div>
        </div>
      </div>
    </nav>
    <!-- Modal Login -->
    <div
      class="modal fade"
      id="loginModal"
      data-bs-backdrop="static"
      data-bs-keyboard="false"
      tabindex="-1"
      aria-labelledby="staticBackdropLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog">
        <div class="modal-content">
          <form action="">
            <div class="modal-header">
              <h5 class="modal-title d-flex align-items-center">
                <i class="bi bi-person-circle fs-3 me-2"></i>
                User Login
              </h5>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
              ></button>
            </div>
            <div class="modal-body">
              <div class="mb-3">
                <label class="form-label">Email address</label>
                <input type="email" class="form-control shadow-none" />
              </div>
              <div class="mb-4">
                <label class="form-label">Password</label>
                <input type="password" class="form-control shadow-none" />
              </div>
              <div
                class="d-flex align-items-center justify-content-between mb-2"
              >
                <button type="submit" class="btn btn-dark shadow-none">
                  LOGIN
                </button>
                <a
                  href="javascript: void(0)"
                  class="text-secondary text-decoration-none"
                  >Forgot Password</a
                >
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- Modal Register -->
    <div
      class="modal fade"
      id="RegisterModal"
      data-bs-backdrop="static"
      data-bs-keyboard="false"
      tabindex="-1"
      aria-labelledby="staticBackdropLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <form action="">
            <div class="modal-header">
              <h5 class="modal-title d-flex align-items-center">
                <i class="bi bi-person-circle fs-3 me-2"></i>
                User Registation
              </h5>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
              ></button>
            </div>
            <div class="modal-body">
              <div class="mb-3">
                <label class="form-label">Email address</label>
                <input type="email" class="form-control shadow-none" />
              </div>
              <div class="mb-4">
                <label class="form-label">Password</label>
                <input type="password" class="form-control shadow-none" />
              </div>
              <div
                class="d-flex align-items-center justify-content-between mb-2"
              >
                <button type="submit" class="btn btn-dark shadow-none">
                  LOGIN
                </button>
                <a
                  href="javascript: void(0)"
                  class="text-secondary text-decoration-none"
                  >Forgot Password</a
                >
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="banner">
      <img class="w-100 d-block" src="{{ asset('img/bookingcare-cover-4.jpg') }}" />
    </div>
    <div class="search text-center">
      <h1>Nền tảng y tế <br /><b>chăm sóc sức khỏe toàn diện</b></h1>
      <form class="d-flex justify-content-center input-search" role="search">
        <input
          class="form-control me-2"
          type="search"
          placeholder="Search"
          aria-label="Search"
        />
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
    <!-- Carousle
    <div class="container-fluid px-lg-4 mt-4">
      <-- Carousle using Swiperjs -->
    <!-- <div class="swiper mySwiper one">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <img class="w-100 d-block" src="img/bookingcare-cover-4.jpg')" />
          </div>
          <div class="swiper-slide">
            <img class="w-100 d-block" src="" />
          </div>
          <div class="swiper-slide">
            <img class="w-100 d-block" src="img/bookingcare-cover-4.jpg')" />
          </div>
          <div class="swiper-slide">
            <img class="w-100 d-block" src="img/bookingcare-cover-4.jpg')" />
          </div>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-pagination"></div>
      </div>
    </div> -->
    <!-- Check fit shift  -->
   @yield('content')
    <!-- Footer -->
    <footer
            class="text-center text-lg-start text-dark"
            style="background-color: #ECEFF1"
            >
      <!-- Section: Social media -->
      <section>
        <div>
          <a href="" class="text-white me-4">
            <i class="fab fa-facebook-f"></i>
          </a>
          <a href="" class="text-white me-4">
            <i class="fab fa-twitter"></i>
          </a>
          <a href="" class="text-white me-4">
            <i class="fab fa-google"></i>
          </a>
          <a href="" class="text-white me-4">
            <i class="fab fa-instagram"></i>
          </a>
          <a href="" class="text-white me-4">
            <i class="fab fa-linkedin"></i>
          </a>
          <a href="" class="text-white me-4">
            <i class="fab fa-github"></i>
          </a>
        </div>
        <!-- Right -->
      </section>
      <!-- Section: Social media -->

      <!-- Section: Links  -->
      <section class="">
        <div class="container text-center text-md-start mt-5">
          <!-- Grid row -->
          <div class="row mt-3">
            <!-- Grid column -->
            <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
              <!-- Content -->
              <h6 class="text-uppercase fw-bold">Company name</h6>
              <hr
                  class="mb-4 mt-0 d-inline-block mx-auto"
                  style="width: 60px; background-color: #7c4dff; height: 2px"
                  />
              <p>
                Here you can use rows and columns to organize your footer
                content. Lorem ipsum dolor sit amet, consectetur adipisicing
                elit.
              </p>
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
              <!-- Links -->
              <h6 class="text-uppercase fw-bold">Products</h6>
              <hr
                  class="mb-4 mt-0 d-inline-block mx-auto"
                  style="width: 60px; background-color: #7c4dff; height: 2px"
                  />
              <p>
                <a href="#!" class="text-dark">MDBootstrap</a>
              </p>
              <p>
                <a href="#!" class="text-dark">MDWordPress</a>
              </p>
              <p>
                <a href="#!" class="text-dark">BrandFlow</a>
              </p>
              <p>
                <a href="#!" class="text-dark">Bootstrap Angular</a>
              </p>
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
              <!-- Links -->
              <h6 class="text-uppercase fw-bold">Useful links</h6>
              <hr
                  class="mb-4 mt-0 d-inline-block mx-auto"
                  style="width: 60px; background-color: #7c4dff; height: 2px"
                  />
              <p>
                <a href="#!" class="text-dark">Your Account</a>
              </p>
              <p>
                <a href="#!" class="text-dark">Become an Affiliate</a>
              </p>
              <p>
                <a href="#!" class="text-dark">Shipping Rates</a>
              </p>
              <p>
                <a href="#!" class="text-dark">Help</a>
              </p>
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
              <!-- Links -->
              <h6 class="text-uppercase fw-bold">Contact</h6>
              <hr
                  class="mb-4 mt-0 d-inline-block mx-auto"
                  style="width: 60px; background-color: #7c4dff; height: 2px"
                  />
              <p><i class="fas fa-home mr-3"></i> New York, NY 10012, US</p>
              <p><i class="fas fa-envelope mr-3"></i> info@example.com</p>
              <p><i class="fas fa-phone mr-3"></i> + 01 234 567 88</p>
              <p><i class="fas fa-print mr-3"></i> + 01 234 567 89</p>
            </div>
            <!-- Grid column -->
          </div>
          <!-- Grid row -->
        </div>
      </section>
      <!-- Section: Links  -->

      <!-- Copyright -->
      <div
           class="text-center p-3"
           style="background-color: rgba(0, 0, 0, 0.2)"
           >
        © 2020 Copyright:
        <a class="text-dark" href="https://mdbootstrap.com/"
           >MDBootstrap.com</a
          >
      </div>
      <!-- Copyright -->
    </footer>
    <!-- Footer -->
  </div>
  <!-- End of .container -->
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
      integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
      integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
      crossorigin="anonymous"
    ></script>
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <script src="{{ asset('js/javascript.js') }}"></script>
  </body>
</html>
