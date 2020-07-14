@extends('layouts.appAdmin')

@section('content')
    <div class="container">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">List Packet Umroh</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <div class="col-12">
            @include('alerts.alert')
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">DataTable Packet Umroh</h3>
                    <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div id="example1_filter" class="dataTables_filter">
                                            <div class="dataTables_length" id="example1_length">
                                                <a href="{{route('packetCreate')}}" class="btn btn-success btn-md text-white ">Create Packet Umroh <i class="fas fa-plus-circle"></i> </a>
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
                <!-- /.card-header -->
                <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                                    <thead>
                                    <tr role="row">
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="No">No</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Title">Title</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Date">Date Takeoff</th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Status" aria-sort="ascending">Status</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Action">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i = 1 ?>
                                    @foreach($packets as $packet )
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$packet->packet_title}}</td>
                                        <?php
                                        $data = $packet->detail->takeoff_date;
                                        $date = explode('-',$data);
                                        ?>
                                        <td>{{$packet->detail->takeoff_date}}</td>
                                        <td>{{$packet->status->status_name}}</td>
                                        <td><a href="{{route('packetDetail',['id'=>$packet->id])}}" class="btn btn-outline-primary btn-sm">Detail <i class="fas fa-search"></i> </a></td>
                                    </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr role="row">
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="No">No</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Title">Title</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Date">Date</th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Status" aria-sort="ascending">Status</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Action">Action</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-5">
                            <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing {{ $packets->firstItem() }} to {{ $packets->lastItem() }} of total {{$packets->total()}} entries</div>
                        </div>
                        <div class="col-sm-12 col-md-7">
                            {{$packets->links()}}
                        </div>
                    </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
@endsection
