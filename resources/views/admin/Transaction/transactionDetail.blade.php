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
                            <a href="{{route('transactionList')}}" class="text-primary breadcrumb-item active"><u>Transaction List</u></a>
                            <li class="breadcrumb-item active">Transaction Detail</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-10">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Transaction Detail</h3>
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
                            <a href="{{route('paymentDetail',['id'=>1])}}" class="text-primary breadcrumb-item active"><u>Payment</u></a>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">List Jamaah</h3>

                        {{--<div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </div>--}}
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0" style="height: 300px;">
                        <table class="table table-head-fixed text-nowrap">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Gender</th>
                                <th>Telephone</th>
                                <th>KTP</th>
                            </tr>
                            </thead>
                            <tbody>
                                @for($i = 0 ; $i < 5 ; $i++)
                                    <tr>
                                        <td>{{$i+1}}</td>
                                        <td>John Doe</td>
                                        <td>11-7-2014</td>
                                        <td><span class="tag tag-success">Approved</span></td>
                                        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                                               View KTP
                                            </button></td>
                                    </tr>
                                @endfor
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Name Jamaah</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img src="/images/pkaet.jpg"  class="img-thumbnail" >
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
@endpush
