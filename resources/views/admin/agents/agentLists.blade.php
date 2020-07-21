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
                            <li class="breadcrumb-item active">Daftar Agent</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">DataTable Agents</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="tableAgent" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                        <thead>
                        <tr role="row">
                            <th>No</th>
                            <th>Email</th>
                            <th>Type Agent</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i = 1 ?>
                        @foreach($agents as $ag)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$ag->user->email}}</td>
                                <td>{{$ag->type->title}}</td>
                                <td>{{$ag->status->status_name}}</td>
                                <td><a href="{{route('agentDetail',['id'=>$ag->id])}}" class="btn btn-outline-primary btn-sm">Detail <i class="fas fa-search"></i> </a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        $(document).ready( function () {
            $('#tableAgent').DataTable(function () {
            });
        } );
    </script>
@endpush
