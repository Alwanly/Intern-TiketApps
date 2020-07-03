@extends('layouts.appUser')

@section('content')
    <header class="section">
        <div class="banner-image">
            <div class="banner-content">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 my-auto text-center">
                            <h1>Umroh Murah<br> Umroh Mudah</h1>
                            <a class="btn btn-custom-primary btn-lg" href="#product" >PESAN</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <section id="product" class="section mb-5">
        <div class="container">
            <div class="text-center product-title">
                <h1>Promo Packet Umroh</h1>
            </div>
            <div class="row">
                @for($i = 0 ; $i < 3 ;$i++)
                    <div class="col-lg-4 d-flex justify-content-center">
                        <div class="card card-product">
                            <img class="card-img-top img-brand" src="/images/pkaet.jpg" alt="Card image cap">
                            <div class="card-body pl-4">
                                <h5 class="card-title col-12">Packet Umroh title </h5>
                                <p class="card-text col-12 "> <i class="nav-icon fas fa-calendar-alt"></i> 2020 </p> <br>
                                <p class="card-text col-12"> <b class="nav-icon">Rp</b> 10.000.000</p>
                            </div>
                        </div>
                    </div>
                    @endfor
            </div>
            <div class="row justify-content-center">
                <div class="col-12 text-center">
                    <a href="/listPacket" class="btn btn-custom-primary">View</a>
                </div>
            </div>
        </div>
    </section>
@endsection
