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
                            <li class="breadcrumb-item active">Daftar Packet Umroh</li>
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
                    <a href="{{route('packetCreate')}}" class="btn btn-success btn-md text-white float-right ">Create Packet Umroh <i class="fas fa-plus-circle"></i></a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="tablePacket" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                                    <thead>
                                    <tr role="row">
                                        <th >No</th>
                                        <th >Title</th>
                                        <th >Date Takeoff</th>
                                        <th >Status</th>
                                        <th >Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i = 1 ?>
                                    @foreach($packets as $packet )
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$packet->packet_title}}</td>
                                        <td>{{$packet->detail->getdateTakeoff()}}</td>
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
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
@endsection
@push('js')
    <script>
        $(document).ready( function () {
            $('#tablePacket').DataTable(function () {
            });
        } );
    </script>
@endpush
