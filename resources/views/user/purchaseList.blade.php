@extends('layouts.appUser')

@section('content')
    <div class="purchase-list-wrapper ">
        <div class="purchase-list-tab-container">
            <div class="purchase-list-tab purchase-list-tab-selected">
                <span class="purchase-list-tab-label">Semua</span>
            </div>
            <div id="tabs" class="purchase-list-tab">
                <span class="purchase-list-tab-label">Menuggu Pembayaran</span>
            </div>
            <div class="purchase-list-tab">
                <span class="purchase-list-tab-label">Pembayaran Berhasil</span>
            </div>
            <div class="purchase-list-tab">
                <span class="purchase-list-tab-label">Menunggu Waktu Manasik</span>
            </div>
            <div class="purchase-list-tab">
                <span class="purchase-list-tab-label">Menunggu Waktu Keberangkatan</span>
            </div>
            <div class="purchase-list-tab">
                <span class="purchase-list-tab-label">Dalam perjalanan Umrah</span>
            </div>
            <div class="purchase-list-tab">
                <span class="purchase-list-tab-label">Tiba di Tanah Air </span>
            </div>
        </div>
        <div class="purchase-list-checkout-container container">
                        @foreach($trs as $tr)
                        <div class="order-card-container"  onclick="location.href='{{ route('paymentIndex',['id'=>$tr->payment->id]) }}'">
                            <div class="float-right">
                                <span class="text-primary text-bold">Payment ID: {{$tr->payment->id}}</span> |
                                <span class="text-blue text-bold">Payment Status: {{$tr->payment->status->status_name}}</span>
                            </div>
                            <div class="order-card-packet">
                                <div class="row">
                                    <div class="col-3">
                                        <div class="order-img-warpper">
                                            <img src="{{asset('storage/bannerPacket/'.$tr->packet->path_bannerpacket)}}">
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="order-packet-wrapper">
                                            <h4>{{$tr->packet->packet_title}}</h4>
                                            <?php $price = \App\Price::find($tr->price_id) ?>
                                            <span><i class="fa fa-bed"></i> <h6>{{$price->room->room_name}}</h6></span>
                                            <br>
                                            <span><i class="fa fa-calendar"></i> <h6>{{$tr->packet->detail->getDateTakeoff()}}</h6></span>
                                            <br>
                                            <span><h6>@currency($price->room->room_price)</h6></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="order-card-status">
                                <div class="row">
                                    <div class="col-6 text-left order-card-status-date">
                                        <h4 class="text-bold">{{\Carbon\Carbon::parse($tr->created_at)->toDateString()}}</h4>
                                    </div>
                                    <div class="col-6 text-right order-card-status-text">

                                        <div class="status-text-wraper text-danger">
                                            <h4 class="text-bold">{{$tr->status->status_name}}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
        </div>
    </div>

@endsection
@push('js-head')

@endpush
@push('js')
    <script>
        $(document).ready(function () {
            var select = '{!! $tabs !!}';
            console.log(select);
            $('.purchase-list-tab').each(function (index) {
                if(index == select) {
                    var pre = $('.purchase-list-tab-selected');
                    pre.removeClass('purchase-list-tab-selected');
                    $(this).addClass('purchase-list-tab-selected').children();
                }
            });

            $('.purchase-list-tab').click(function () {
                var pre = $('.purchase-list-tab-selected');
                pre.removeClass('purchase-list-tab-selected');

                var $att = $(this).addClass('purchase-list-tab-selected').index();

                location.href ='/u/purchase-list/'+$att;

            });



        });
    </script>
@endpush
