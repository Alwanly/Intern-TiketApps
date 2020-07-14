@extends('layouts.appAdmin')

@section('content')
    <div class="container">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2 m-md-2">
                    <div class="col-sm-6 col-md-6">
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <ol class="breadcrumb float-sm-right">
                            <a href="{{route('paymentList')}}" class="text-primary breadcrumb-item active"><u>Payment List</u></a>
                            <li class="breadcrumb-item active">Payment Detail</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        @include('alerts.alert')
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-10">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Payment Detail</h3>
                    </div>
                    <div class="card-body">
                            <div class="form-group">
                                <label for="inputEmail4">Name</label>
                                <input type="email" class="form-control" disabled value="{{$payment->transaction->user->name}}">
                            </div>
                            <div class="form-group">
                                <label for="inputEmail4">Packet</label>
                                <input type="text" class="form-control" disabled value="{{$payment->transaction->packet->packet_title}}">
                            </div>
                            <div class="form-group">
                                <label>Payment with Bank</label>
                                <div class="form-row">
                                    <div class="form-group col-md-12 col-lg-12">
                                        <input type="text" class="form-control"  disabled  value="{{$payment->bank->bank_name}}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Status</label>
                                <input type="text" class="form-control" disabled id="inputCity" value="{{$payment->paymentConfirm->status->status_name}}">
                            </div>
                        <div class="form-group">
                            <a href="{{route('transactionDetail',['id'=>$payment->transaction_id])}}" class="text-primary breadcrumb-item active"><u>Transaction</u></a>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Payment Confirmation</h3>
                    </div>
                    <div class="card-body">

                        <form action="{{route('paymentUpdate')}}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{$payment->paymentConfirm->id}}">
                            <div class="form-group">
                                <label for="inputEmail4">Bank</label>
                                <input type="text" class="form-control" id="inputEmail4" disabled value="{{$payment->paymentConfirm->bank->bank_name}}">
                            </div>
                            <div class="form-group">
                                <label for="inputEmail4">No Rekening</label>
                                <input type="text" class="form-control" id="inputEmail4" disabled value="{{$payment->paymentConfirm->norekening}}">
                            </div>
                            <div class="form-group">
                                <label>Name Rekening</label>
                                <div class="form-row">
                                    <div class="form-group col-md-12 col-lg-12">
                                        <input type="text" class="form-control" id="inputCity" disabled value="{{$payment->paymentConfirm->rekening_name}}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputCity">Transfer Photo</label> <br>
                                <img src="{{asset('storage/photoTransfer/'.$payment->paymentConfirm->path_photoproof)}}" style="width: 300px;height: 150px" class="img-thumbnail" >
                            </div>
                            @if($payment->paymentConfirm->status->status_name == 'Menunggu Konfirmasi' )
                            <button type="submit" name="submit" id="accept" class="btn btn-primary btn-md" value="Accept">Accept</button>
                            <button type="submit" name="submit" id="decline" class="btn btn-danger btn-md" value="Decline">Decline</button>
                                @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
@endpush
