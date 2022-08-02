@extends('layouts.layout_client_master')

@section('content')
    <div class="container">
        <div class="row">
            <h1 class="text-center py-lg-5">Đặt lịch khám bệnh </h1>
        </div>
        <div class="row">
            <div class="row">
                <div class="col-lg-6">
                    <div class="d-flex justify-content-center img-doctor border border-1 text-center">
                        <img class="p-4" src="images/090430-uu-dai-di-kham-mediplus.jpg" alt="">
                    </div>
                    <p>NAME: </p>
                    <p>AGE: </p>
                    <p>LEVEL: </p>
                </div>
                <div class="col-lg-6">
                    <section class="ftco-section">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <h2 class="heading-section mb-5 pb-md-4">Checkbox #04</h2>
                                </div>
                            </div>
                            <div class="row">
                                <form action="" method="post">
                                    <div class="checkbox-book d-flex flex-wrap justify-content-between">
                                        <div class="checkbox-item p-4">
                                            <input type="radio" name="choose-shift" id="checkboxOne" value="Order one"
                                                checked>
                                            <label for="checkboxOne">Volleyball</label>
                                        </div>
                                        <div class="checkbox-item p-4">
                                            <input type="radio" name="choose-shift" id="checkboxTwo" value="Order Two">
                                            <label for="checkboxTwo">Swimming</label>
                                        </div>
                                        <div class="checkbox-item p-4">
                                            <input type="radio" name="choose-shift" id="checkboxThree" value="Order Two">
                                            <label for="checkboxThree">Surfing</label>
                                        </div>
                                    </div>
                                </form>
                            </div>
                    </section>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <h3>Description</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem minima similique, illum distinctio autem
                        facilis
                        officiis quo exercitationem ipsum totam quia enim. Modi ipsa, dolorum facilis dignissimos alias
                        accusamus
                        odit?</p>
                </div>
            </div>
        </div>
    @endsection
