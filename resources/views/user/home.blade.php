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
                @foreach($packets as $packet)
                    <div class="col-lg-4 d-flex justify-content-center">
                        <div class="card card-product" onclick="location.href='{{ route('detailPacket',['id'=>$packet->id]) }}'"  >
                                <div class="img-brand">
                                <img class="card-img-top" src="{{ asset('storage/bannerPacket/'.$packet->path_bannerpacket) }}" alt="Card image cap">
                                </div>
                            <div class="card-body">
                                <h5 class="card-title">{{$packet->packet_title}}</h5><br>
                                <br>
                                <p class="card-text"> <i class="nav-icon fas fa-calendar-alt"></i> {{$packet->detail->getDateTakeoff()}} </p>
                                <br>
                                <p class="card-text"> @currency($packet->price[0]->room->room_price)</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
            </div>
            <div class="row justify-content-center">
                <div class="col-12 text-center">
                    <a href="{{route('listPacket')}}" class="btn btn-custom-primary">View</a>
                </div>
            </div>
        </div>
    </section>
@endsection
