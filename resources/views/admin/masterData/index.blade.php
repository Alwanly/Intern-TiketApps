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
            <div class="row">
                <div class="col-lg-6 col-sm-12 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">DataTable Method Payment</h3>
                            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            </div>
                            <div class="card-tools">
                                <a href="{{route('createMethod')}}" class="btn btn-primary btn-md text-white ">Create Method Payment <i class="fas fa-plus-circle"></i> </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                                        <thead>
                                        <tr role="row">
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="No">No</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="No">Name</th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Status" aria-sort="ascending">Status</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Action">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Transfer Bank</td>
                                                <td>Active</td>
                                                <td><a href="{{route('transactionDetail',['id'=>0])}}" class="btn btn-outline-primary btn-sm">Detail <i class="fas fa-search"></i> </a></td>
                                            </tr><tr>
                                                <td>2</td>
                                                <td>Go Pay</td>
                                                <td>Active</td>
                                                <td><a href="{{route('transactionDetail',['id'=>1])}}" class="btn btn-outline-primary btn-sm">Detail <i class="fas fa-search"></i> </a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
{{--                            <div class="row">--}}
{{--                                <div class="col-12">--}}
{{--                                    <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-12">--}}
{{--                                    <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">--}}
{{--                                        <ul class="pagination">--}}
{{--                                            <li class="paginate_button page-item previous disabled" id="example1_previous"><a href="#" aria-controls="example1" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>--}}
{{--                                            <li class="paginate_button page-item active"><a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>--}}
{{--                                            <li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="2" tabindex="0" class="page-link">2</a></li>--}}
{{--                                            <li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="3" tabindex="0" class="page-link">3</a></li>--}}
{{--                                            <li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="4" tabindex="0" class="page-link">4</a></li>--}}
{{--                                            <li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="5" tabindex="0" class="page-link">5</a></li>--}}
{{--                                            <li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="6" tabindex="0" class="page-link">6</a></li>--}}
{{--                                            <li class="paginate_button page-item next" id="example1_next"><a href="#" aria-controls="example1" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">DataTable Room Type</h3>
                            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            </div>
                            <div class="card-tools">
                                <a href="{{route('createRoom')}}" class="btn btn-primary btn-md text-white ">Create Room Type <i class="fas fa-plus-circle"></i> </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                                        <thead>
                                        <tr role="row">
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="No">No</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="No">Name</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="No">Capacity</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="No">Price</th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Status" aria-sort="ascending">Status</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Action">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>1 Kamar 2 Orang</td>
                                            <td>2</td>
                                            <td>Rp. 10.000.000</td>
                                            <td>Active</td>
                                            <td><a href="{{route('transactionDetail',['id'=>0])}}" class="btn btn-outline-primary btn-sm">Detail <i class="fas fa-search"></i> </a></td>
                                        </tr><tr>
                                            <td>2</td>
                                            <td>1 Kamar 4 Orang</td>
                                            <td>4</td>
                                            <td>Rp.12.000.000</td>
                                            <td>Active</td>
                                            <td><a href="{{route('transactionDetail',['id'=>1])}}" class="btn btn-outline-primary btn-sm">Detail <i class="fas fa-search"></i> </a></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            {{--                            <div class="row">--}}
                            {{--                                <div class="col-12">--}}
                            {{--                                    <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries--}}
                            {{--                                    </div>--}}
                            {{--                                </div>--}}
                            {{--                                <div class="col-12">--}}
                            {{--                                    <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">--}}
                            {{--                                        <ul class="pagination">--}}
                            {{--                                            <li class="paginate_button page-item previous disabled" id="example1_previous"><a href="#" aria-controls="example1" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>--}}
                            {{--                                            <li class="paginate_button page-item active"><a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>--}}
                            {{--                                            <li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="2" tabindex="0" class="page-link">2</a></li>--}}
                            {{--                                            <li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="3" tabindex="0" class="page-link">3</a></li>--}}
                            {{--                                            <li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="4" tabindex="0" class="page-link">4</a></li>--}}
                            {{--                                            <li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="5" tabindex="0" class="page-link">5</a></li>--}}
                            {{--                                            <li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="6" tabindex="0" class="page-link">6</a></li>--}}
                            {{--                                            <li class="paginate_button page-item next" id="example1_next"><a href="#" aria-controls="example1" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li>--}}
                            {{--                                        </ul>--}}
                            {{--                                    </div>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">DataTable Airlines</h3>
                            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            </div>
                            <div class="card-tools">
                                <a href="{{route('createAirlines')}}" class="btn btn-primary btn-md text-white ">Create Airlines <i class="fas fa-plus-circle"></i> </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                                        <thead>
                                        <tr role="row">
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="No">No</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="No">Name</th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Status" aria-sort="ascending">Status</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Action">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Garuda</td>
                                            <td>Active</td>
                                            <td><a href="{{route('transactionDetail',['id'=>0])}}" class="btn btn-outline-primary btn-sm">Detail <i class="fas fa-search"></i> </a></td>
                                        </tr><tr>
                                            <td>2</td>
                                            <td>Lion Airs</td>
                                            <td>Active</td>
                                            <td><a href="{{route('transactionDetail',['id'=>1])}}" class="btn btn-outline-primary btn-sm">Detail <i class="fas fa-search"></i> </a></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            {{--                            <div class="row">--}}
                            {{--                                <div class="col-12">--}}
                            {{--                                    <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries--}}
                            {{--                                    </div>--}}
                            {{--                                </div>--}}
                            {{--                                <div class="col-12">--}}
                            {{--                                    <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">--}}
                            {{--                                        <ul class="pagination">--}}
                            {{--                                            <li class="paginate_button page-item previous disabled" id="example1_previous"><a href="#" aria-controls="example1" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>--}}
                            {{--                                            <li class="paginate_button page-item active"><a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>--}}
                            {{--                                            <li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="2" tabindex="0" class="page-link">2</a></li>--}}
                            {{--                                            <li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="3" tabindex="0" class="page-link">3</a></li>--}}
                            {{--                                            <li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="4" tabindex="0" class="page-link">4</a></li>--}}
                            {{--                                            <li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="5" tabindex="0" class="page-link">5</a></li>--}}
                            {{--                                            <li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="6" tabindex="0" class="page-link">6</a></li>--}}
                            {{--                                            <li class="paginate_button page-item next" id="example1_next"><a href="#" aria-controls="example1" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li>--}}
                            {{--                                        </ul>--}}
                            {{--                                    </div>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">DataTable Categories</h3>
                            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            </div>
                            <div class="card-tools">
                                <a href="{{route('createCategory')}}" class="btn btn-primary btn-md text-white ">Create Category <i class="fas fa-plus-circle"></i> </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                                        <thead>
                                        <tr role="row">
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="No">No</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="No">Name</th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Status" aria-sort="ascending">Status</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Action">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>VIP</td>
                                            <td>Active</td>
                                            <td><a href="{{route('transactionDetail',['id'=>0])}}" class="btn btn-outline-primary btn-sm">Detail <i class="fas fa-search"></i> </a></td>
                                        </tr><tr>
                                            <td>2</td>
                                            <td>VVIP</td>
                                            <td>Active</td>
                                            <td><a href="{{route('transactionDetail',['id'=>1])}}" class="btn btn-outline-primary btn-sm">Detail <i class="fas fa-search"></i> </a></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            {{--                            <div class="row">--}}
                            {{--                                <div class="col-12">--}}
                            {{--                                    <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries--}}
                            {{--                                    </div>--}}
                            {{--                                </div>--}}
                            {{--                                <div class="col-12">--}}
                            {{--                                    <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">--}}
                            {{--                                        <ul class="pagination">--}}
                            {{--                                            <li class="paginate_button page-item previous disabled" id="example1_previous"><a href="#" aria-controls="example1" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>--}}
                            {{--                                            <li class="paginate_button page-item active"><a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>--}}
                            {{--                                            <li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="2" tabindex="0" class="page-link">2</a></li>--}}
                            {{--                                            <li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="3" tabindex="0" class="page-link">3</a></li>--}}
                            {{--                                            <li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="4" tabindex="0" class="page-link">4</a></li>--}}
                            {{--                                            <li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="5" tabindex="0" class="page-link">5</a></li>--}}
                            {{--                                            <li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="6" tabindex="0" class="page-link">6</a></li>--}}
                            {{--                                            <li class="paginate_button page-item next" id="example1_next"><a href="#" aria-controls="example1" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li>--}}
                            {{--                                        </ul>--}}
                            {{--                                    </div>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
