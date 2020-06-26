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
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-10">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Payment Detail</h3>
                    </div>
                    <div class="card-body">
                            <div class="form-group">
                                <label for="inputEmail4">Email</label>
                                <input type="email" class="form-control" disabled id="inputEmail4" placeholder="email@email.com">
                            </div>
                            <div class="form-group">
                                <label for="inputEmail4">Packet</label>
                                <input type="text" class="form-control" disabled id="inputEmail4" placeholder="Packet">
                            </div>
                            <div class="form-group">
                                <label>Payment with Bank</label>
                                <div class="form-row">
                                    <div class="form-group col-md-12 col-lg-12">
                                        <input type="text" class="form-control"  disabled id="inputCity" placeholder="BCA">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Status</label>
                                <input type="text" class="form-control" disabled id="inputCity" placeholder="Sudah Dibayar">
                            </div>
                        <div class="form-group">
                            <a href="{{route('transactionDetail',['id'=>1])}}" class="text-primary breadcrumb-item active"><u>Transaction</u></a>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Payment Confirmation</h3>
                    </div>
                    <div class="card-body">
                        <form action="#">
                            <div class="form-group">
                                <label for="inputEmail4">Bank</label>
                                <input type="text" class="form-control" id="inputEmail4" placeholder="BCA">
                            </div>
                            <div class="form-group">
                                <label for="inputEmail4">No Rekening</label>
                                <input type="text" class="form-control" id="inputEmail4" placeholder="0808080">
                            </div>
                            <div class="form-group">
                                <label>Name Rekening</label>
                                <div class="form-row">
                                    <div class="form-group col-md-12 col-lg-12">
                                        <input type="text" class="form-control" id="inputCity" placeholder="Name">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputCity">Transfer Photo</label> <br>
                                <img src="/images/pkaet.jpg" style="width: 300px;height: 150px" class="img-thumbnail" >
                            </div>
                            <button type="submit" id="submit" class="btn btn-primary btn-md" value="Accept">Accept</button>
                            <button type="submit" id="submit" class="btn btn-danger btn-md" value="Decline">Decline</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
@endpush
