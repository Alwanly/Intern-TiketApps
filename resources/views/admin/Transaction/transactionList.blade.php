@extends('layouts.appAdmin')

@section('content')
    <div class="container">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">Transaction List</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">DataTable Transaction</h3>
                    <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div id="example1_filter" class="dataTables_filter">
                                                <div class="dataTables_length" id="example1_length">
                                                    <a href="{{route('transactionUpdate')}}" class="btn btn-success btn-md text-white ">Update Transaction <i class="fas fa-plus-circle"></i> </a>
                                                </div>
                                                <br>
                                        </div>
                                    </div>
                                    <div class="col-md-6 align-self-center">
                                        <div id="example1_filter" class="dataTables_filter ">
                                            <label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="example1"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                                    <thead>
                                    <tr role="row">
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="No">No</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="No">User</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Title">Packet</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Date">Date</th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Status" aria-sort="ascending">Status</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Action">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @for($i = 0; $i < 4 ;$i++ )
                                        <tr>
                                            <td>{{$i+1}}</td>
                                            <td>Alwan</td>
                                            <td>Paket Umroh murah</td>
                                            <td>2021</td>
                                            <td>Menungu Pembayaran</td>
                                            <td><a href="{{route('transactionDetail',['id'=>$i])}}" class="btn btn-outline-primary btn-sm">Detail <i class="fas fa-search"></i> </a></td>
                                        </tr>
                                    @endfor
                                    @for($i = 4; $i < 8 ;$i++ )
                                        <tr>
                                            <td>{{$i+1}}</td>
                                            <td>Ley</td>
                                            <td>Paket Umroh VIP</td>
                                            <td>202{{$i}}</td>
                                            <td>Menuggu waktu Manasik</td>
                                            <td><a href="{{route('transactionDetail',['id'=>$i])}}" class="btn btn-outline-primary btn-sm">Detail <i class="fas fa-search"></i> </a></td>
                                        </tr>
                                    @endfor
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-5">
                            <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-7">
                            <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                                <ul class="pagination">
                                    <li class="paginate_button page-item previous disabled" id="example1_previous"><a href="#" aria-controls="example1" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
                                    <li class="paginate_button page-item active"><a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                                    <li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="2" tabindex="0" class="page-link">2</a></li>
                                    <li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="3" tabindex="0" class="page-link">3</a></li>
                                    <li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="4" tabindex="0" class="page-link">4</a></li>
                                    <li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="5" tabindex="0" class="page-link">5</a></li>
                                    <li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="6" tabindex="0" class="page-link">6</a></li>
                                    <li class="paginate_button page-item next" id="example1_next"><a href="#" aria-controls="example1" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
