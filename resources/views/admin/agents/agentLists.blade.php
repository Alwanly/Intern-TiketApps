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
                            <li class="breadcrumb-item active">List Agent</li>
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
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @for($i = 0; $i < 3 ;$i++ )
                            <tr>
                                <td>{{$i+1}}</td>
                                <td>test@mail.com</td>
                                <td>Waiting</td>
                                <td><a href="{{route('agentDetail',['id'=>$i])}}" class="btn btn-outline-primary btn-sm">Detail <i class="fas fa-search"></i> </a></td>
                            </tr>
                        @endfor
                        @for($i = 3; $i < 11 ;$i++ )
                            <tr>
                                <td>{{$i+1}}</td>
                                <td>test@mail.com</td>
                                <td>Accept</td>
                                <td><a href="{{route('agentDetail',['id'=>$i])}}" class="btn btn-outline-primary btn-sm">Detail <i class="fas fa-search"></i> </a></td>
                            </tr>
                        @endfor
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
