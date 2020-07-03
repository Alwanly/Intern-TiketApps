@extends('layouts.appUser')

@section('content')
    <div class="purchase-list-wrapper container">
        <div class="purchase-list-tab-container">
            <div class="purchase-list-tab purchase-list-tab-selected">
                <span class="purchase-list-tab-label pu">Semua</span>
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
            <div class="order-card-container">
                <div class="order-card-packet">
                    <div class="row">
                        <div class="col-3">
                            <div class="order-img-warpper">
                                <img src="/images/pkaet.jpg">
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="order-packet-wrapper">
                                <h4>Packet Umroh</h4>
                                <span><i class="fa fa-bed"></i> <h6>1 room 3 people</h6></span>
                                <br>
                                <span><i class="fa fa-calendar"></i> <h6>2020</h6></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="order-card-status">
                    <div class="row">
                        <div class="col-6 text-left order-card-status-date">
                            <h4 class="text-bold">06/06/2020</h4>
                        </div>
                        <div class="col-6 text-right order-card-status-text">
                            <div class="status-text-wraper text-success">
                                <h4 class="text-bold">Sudah dibayar</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="order-card-container"  onclick="location.href='{{ url('/listPacket/detail') }}'">
                <div class="order-card-packet">
                    <div class="row">
                        <div class="col-3">
                            <div class="order-img-warpper">
                                <img src="/images/pkaet.jpg">
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="order-packet-wrapper">
                                <h4>Packet Umroh</h4>
                                <span><i class="fa fa-bed"></i> <h6>1 room 3 people</h6></span>
                                <br>
                                <span><i class="fa fa-calendar"></i> <h6>2020</h6></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="order-card-status">
                    <div class="row">
                        <div class="col-6 text-left order-card-status-date">
                            <h4 class="text-bold">06/06/2020</h4>
                        </div>
                        <div class="col-6 text-right order-card-status-text">
                            <div class="status-text-wraper text-danger">
                                <h4 class="text-bold">Belum dibayar</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
@endpush
