@extends('layouts.appAdmin')

@section('content')
    <div class="container">
        <div class="content-header">
                <div class="row mb-2">
                    <div class="col-sm-6">
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">Daftar Transaction</li>
                        </ol>
                    </div>
                </div>
        </div>
        <div class="card">
                <div class="card-header">
                    <h3 class="card-title">DataTable Transaction</h3>
                    <div class="dataTables_length float-right" id="example1_length">
                        <a href="{{route('transactionEdit')}}" class="btn btn-success btn-md text-white ">Update Transaction <i class="fas fa-plus-circle"></i> </a>
                    </div>
                    <br>
                </div>
                <div class="card-body">
                    <div class="col-12 table-responsive -border-none">
                        <table id="transactionTable" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                            <thead>
                            <tr role="row">
                                <th>No</th>
                                <th>Transaction ID</th>
                                <th>User</th>
                                <th >Packet</th>
                                <th>Date Transaction</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i=1 ?>
                            @foreach($transactions as $tr)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$tr->id}}</td>
                                    <td>{{$tr->user->name}}</td>
                                    <td>{{$tr->packet->packet_title}}</td>
                                    <td>{{$tr->getDateCreate()}}</td>
                                    <td>{{$tr->status->status_name}}</td>
                                    <td><a href="{{route('transactionDetail',['id'=>$tr->id])}}" class="btn btn-outline-primary btn-sm">Detail <i class="fas fa-search"></i> </a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </div>
@endsection
@push('js')
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#transactionTable').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'excel',
                        filename: 'Transaksi',
                        title: 'Daftar Transaksi'
                    },
                ],
            } );
        } );
    </script>
@endpush
