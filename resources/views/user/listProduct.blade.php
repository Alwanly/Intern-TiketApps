@extends('layouts.appUser')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item">List Packet Umroh</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
         {{--  <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-filer" onclick="" >
                    <div class="card-header">
                        <h5 class="card-title"> Filter</h5>
                    </div>
                    <div class="card-body">
                        <div class="card-filter">
                            <div class="row">
                                <div class="col-5 card-filter-title justify-content-center">
                                    <h5>Date</h5>
                                </div>
                                <div class="col-4"></div>
                                <div class="card-filter-icon col-auto text-right">
                                    <a class="" type="button" data-toggle="collapse" href="#list-date"  aria-label="Toggle navigation">
                                        <span class="nav-icon fa fa-list"></span>
                                    </a>
                                </div>
                            </div>
                            <ul id="list-date" class="list-group collapse show">
                            <li class="list-group-item">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">2020</label>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">2021</label>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">2022</label>
                                </div>
                            </li>
                        </ul>
                        </div>
                        <hr>
                        <div class="card-filter">
                            <div class="row">
                                <div class="col-5 card-filter-title justify-content-center">
                                    <h5>Airlines</h5>
                                </div>
                                <div class="col-4"></div>
                                <div class="card-filter-icon col-auto text-right">
                                    <a class="" type="button" data-toggle="collapse" href="#list-airlines"  aria-label="Toggle navigation">
                                        <span class="nav-icon fa fa-list"></span>
                                    </a>
                                </div>
                            </div>
                            <ul id="list-airlines" class="list-group collapse show">
                            <li class="list-group-item">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Garuda</label>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Lion Air</label>
                                </div>
                            </li>
                        </ul>
                        </div>
                    </div>
                </div>
            </div>--}}
            <div class="col-lg-12 col-md-6 col-sm-12">
                <div class="row">
                    @foreach($packets as $packet)
                        <div class="col-lg-4 d-flex justify-content-center p-3">
                            <div class="card card-product" onclick="location.href='{{ route('detailPacket',['id'=>$packet->id]) }}'"  >
                                <div class="img-brand">
                                    <img class="card-img-top" src="{{ asset('storage/bannerPacket/'.$packet->path_bannerpacket) }}" alt="Card image cap">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">{{$packet->packet_title}}</h5>
                                    <p class="card-text d-block"> <i class="nav-icon fas fa-calendar-alt"></i> {{$packet->detail->takeoff_date}} </p>
                                    <p class="card-text"> <b class="nav-icon">Rp</b> {{$packet->price[0]->room->room_price}}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row justify-content-center ">
                    <nav aria-label="Page navigation example">
                        <div class="col-12 text-center">
                            {{$packets->links()}}
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
