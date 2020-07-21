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
                            <li class="breadcrumb-item active">Daftar Payment</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">DataTable Payment</h3>
                </div>
                <div class="card-body">
                    <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="paymentTable" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                                    <thead>
                                    <tr role="row">
                                        <th >No</th>
                                        <th >User</th>
                                        <th >Bank</th>
                                        <th >Date</th>
                                        <th >Status</th>
                                        <th >Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i=1?>
                                    @foreach($payments as $p)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$p->transaction->user->name}}</td>
                                            <td>{{$p->bank->bank_name}}</td>
                                            <td>{{$p->getDateUpdate()
}}</td>
                                            <td>{{$p->status->status_name}}</td>
                                            <td><a href="{{route('paymentDetail',['id'=>$p->id])}}" class="btn btn-outline-primary btn-sm">Detail <i class="fas fa-search"></i> </a></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        $(document).ready( function () {
            $('#paymentTable').DataTable(function () {
            });
        } );
    </script>
@endpush
