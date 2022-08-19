@extends('layouts.layout_client_master')

@section('content')
    <div class="container">
        <main>
            <div class="py-5 text-center">
                <h2>Checkout form</h2>
            </div>

            <div class="row g-5">
                <div class="col-md-5 col-lg-4 order-md-last">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-primary">Your cart</span>
                    </h4>
                    <ul class="list-group mb-3">
                        <li class="list-group-item d-flex justify-content-between lh-sm">
                            <div>
                                <h6 class="my-0">{{ $getPackage->name }}</h6>
                            </div>
                            <span class="text-muted">{{ $getPackage->price }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Total</span>
                            <strong>{{ $getPackage->price }}</strong>
                        </li>
                    </ul>
                </div>
                <div class="col-md-7 col-lg-8">
                    <h4 class="mb-3">Thông tin cá nhân</h4>
                    <form action="{{ route('package.save') }}" method="POST">
                        @csrf
                        <input type="hidden" name="package_id" value="{{ $getPackage->id }}">
                        <input type="hidden" name="package_count" value="{{ $getPackage->count }}">
                        <input type="hidden" name="package_buy_number" value="{{ $getPackage->buy_number }}">
                        <div class="row g-3">
                            <div class="col-12">
                                <label for="username" class="form-label">Họ và tên</label>
                                <input type="text" class="form-control" id="username" placeholder="Username"
                                    value="{{ Auth::user()->name }}">
                            </div>

                            <div class="col-12">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" placeholder="you@example.com"
                                    value="{{ Auth::user()->email }}">
                            </div>

                            <div class="col-12">
                                <label for="address" class="form-label">Địa chỉ</label>
                                <input type="text" class="form-control" id="address" placeholder="1234 Main St"
                                    required="">
                                <div class="invalid-feedback">
                                    Please enter your shipping address.
                                </div>
                            </div>


                            <hr class="my-4">

                            <h4 class="mb-3">Phương thức thanh toán</h4>

                            <div class="my-3">
                                <div class="form-check">
                                    <input id="paypal" name="paymentMethod" type="radio" class="form-check-input">
                                    <label class="form-check-label" for="paypal">Thanh toán tại bệnh viện</label>
                                </div>
                                <div class="form-check">
                                    <input id="credit" name="paymentMethod" disabled type="radio" class="form-check-input">
                                    <label class="form-check-label" for="credit">Thanh toán online</label>
                                </div>
                            </div>
                            <hr class="my-4">
                            <input type="hidden" name="doctor_id" value="{{ $getDoctor->id }}">
                            <button class="w-100 btn btn-primary btn-lg" type="submit">Continue to checkout</button>
                    </form>
                </div>
            </div>
        </main>
    </div>
@endsection
