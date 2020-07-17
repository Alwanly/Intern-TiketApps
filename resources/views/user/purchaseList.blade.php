@extends('layouts.appUser')

@section('content')
    <div class="purchase-list-wrapper container">
        <div class="purchase-list-tab-container">
            <div class="purchase-list-tab purchase-list-tab-selected">
                <span class="purchase-list-tab-label">Semua</span>
            </div>
            <div class="purchase-list-tab ">
                <span class="purchase-list-tab-label">Belum dibayar</span>
            </div>
            <div class="purchase-list-tab">
                <span class="purchase-list-tab-label">Menuggu Konfirmasi</span>
            </div>
            <div class="purchase-list-tab">
                <span class="purchase-list-tab-label">Sudah Bayar</span>
            </div>
            <div class="purchase-list-tab">
                <span class="purchase-list-tab-label">Selesai</span>
            </div>
        </div>
        <div class="purchase-list-checkout-container">
            @foreach($trs as $tr)
            <div class="order-card-container"  onclick="location.href='{{ url('/listPacket/detail') }}'">
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
                                <span><i class="fa fa-calendar"></i> <h6>{{$tr->packet->detail->takeoff_date}}</h6></span>
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
@push('js')
    <script>
        $(document).ready(function () {
            // var menu = $('.purchase-list-tab').filter('.purchase-list-tab-selected');
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
