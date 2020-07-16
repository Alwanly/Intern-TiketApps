@extends('layouts.appAdmin')

@section('content')
    <div class="container">
        <div class="content-header">
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
                                    <td>{{$tr->user->name}}</td>
                                    <td>{{$tr->packet->packet_title}}</td>
                                    <td>{{\Carbon\Carbon::parse($tr->created_at)->toDayDateTimeString()}}</td>
                                    <td>{{$tr->status->status_name}}</td>
                                    <td><a href="{{route('transactionDetail',['id'=>$tr->id])}}" class="btn btn-outline-primary btn-sm">Detail <i class="fas fa-search"></i> </a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
         {{-- <div class="row">
                        <div class="col-sm-12 col-md-5">
                            <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing {{ $transactions->firstItem() }} to {{ $transactions->lastItem() }} of total {{$transactions->total()}} entries</div>
                        </div>
                        <div class="col-sm-12 col-md-7">
                            {{$transactions->links()}}
                        </div>
                    </div>--}}
                </div>
            </div>
    </div>
@endsection
@push('js')
    <script>
        $(document).ready( function () {
            $('#transactionTable').DataTable(function () {
            });
        } );
    </script>
@endpush
