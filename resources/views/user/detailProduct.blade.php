@extends('layouts.appUser')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('listPacket')}}"> List Packet Umroh</a></li>
                        <li class="breadcrumb-item">Detail Packet Umroh</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-4">
                <div class="img-detail-wrapper">
                    <div class="img-brand">
                        <img src="{{ asset('storage/bannerPacket/'.$packet->path_bannerpacket) }}" >
                    </div>
                </div>
            </div>
            <div class="col-8">
                <div class="card">
                    <form action="{{route('orderPacket')}}" method="get">
                        @csrf
                    <div class="container" style="padding: 10px">
                    <h3 class="text-tilte">{{$packet->packet_title}}h</h3>
                    <hr>
                    <div class="row">
                        <div class="card-item col-lg-2 col-md-2 col-sm-12">
                            <h4 class="text-subtitle">Date</h4>
                        </div>
                        <div class="card-item col-lg-10 col-md-10 col-sm-12">
                            <ul class="list-group">
                                <li class="list-group-item">Manasik : {{$packet->detail->getDateManasik()}}</li>
                                <li class="list-group-item">Takeoff :  {{$packet->detail->getDateTakeoff()}}</li>
                                <li class="list-group-item">Return :  {{$packet->detail->getDateReturn()}}</li>
                            </ul>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="card-item col-lg-2 col-md-2 col-sm-12">
                            <h4 class="text-subtitle">Airline</h4>
                        </div>
                        <div class="card-item col-lg-10 col-md-10 col-sm-12">
                            <p>{{$packet->airline->airlines_name}}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="card-item col-lg-2 col-md-2 col-sm-12">
                            <h4 class="text-subtitle ">Price</h4>

                        </div>
                        <div class="card-item col-lg-10 col-md-10 col-sm-12">
                           <h3 class="text-tilte price">@currency(0)</h3>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="card-item col-lg-2 col-md-2 col-sm-12">
                            <h4 class="text-subtitle">Room Type</h4>

                        </div>
                        <div class="card-item col-lg-10 col-md-10 col-sm-12">
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                @foreach($packet->price as $price)
                                <label id="{{$price->room->room_price}}" class="btn btn-custom-outline radio-price">
                                    <input type="radio" name="price_id" id="room" value="{{$price->id}}" >{{$price->room->room_name}}
                                </label>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <hr>
                        <div class="row">
                            <div class="card-item col-lg-2 col-md-2 col-sm-12">
                                <h4 class="text-subtitle">Description</h4>
                            </div>
                            <div class="card-item col-lg-10 col-md-10 col-sm-12">
                               <p class="text-justify">{{$packet->packet_desc}}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="card-item col-lg-2 col-md-2 col-sm-12">
                                <h4 class="text-subtitle">Note</h4>
                            </div>
                            <div class="card-item col-lg-10 col-md-10 col-sm-12">
                                <p class="text-justify">{{$packet->note}}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-12 text-center">
                                <button type="submit"  class="btn btn-custom-secondry btn-lg">Order</button>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
<script>
    function count(value) {
        var total = document.getElementById('counter').value;
        if(value === 'add'){
            total++;
        }else if(value === 'minus' && total != 1){
            total--;
        }
        document.getElementById('counter').value = total;
    }

    $('.radio-price').click(function () {
        var price = $(this).attr('id');
        const id =  $('#'+price+' input').val();
        var	reverse = price.toString().split('').reverse().join(''),
            idr 	= reverse.match(/\d{1,3}/g);
        idr	= idr.join('.').split('').reverse().join('');
        $('.price').html("Rp. "+idr);
        $('#price_id').val(id);
    })
</script>
@endpush
