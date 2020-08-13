@extends('layouts.appAdmin')

@section('content')
    <div class="container">
        <div class="content-header">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Report</li>
                    </ol>
                </div>
            </div>
        </div>
        <form action="{{route('reportData')}}" method="get">

                <div class="form-group row col-12">
                    <div class="col-sm-3">
                        <label for="start_date" class=" col-form-label">Tanggal Awal</label>
                        <input name="start_date" type="date" class="form-control" id="start_date" placeholder="Email">
                    </div>
                    <div class="col-sm-3">
                        <label for="end_date" class=" col-form-label">Tanggal Awal</label>
                        <input name="end_date" type="date" class="form-control" id="inputEmail3" placeholder="Email">
                    </div>
                    <div class="col-sm-5 d-flex align-items-center">
                        <button type="submit" class="btn btn-primary ">Submit</button>
                    </div>
                </div>
        </form>

        @if(!empty($transaction))
            <div class="card">
            <div class="card-header">
                <h3 class="card-title">DataTable Transaction</h3>
            </div>
            <div class="card-body">
                <div class="col-12 table-responsive -border-none">
                    <table id="report" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                        <thead>
                        <tr role="row">
                            <th>ID Transaksi</th>
                            <th>Nama Jamaah</th>
                            <th>Email Jamaah</th>
                            <th>No Telp Jamaah</th>
                            <th>Tanggal Daftar</th>
                            <th>ID Paket</th>
                            <th>Nama Paket</th>
                            <th>Tanggal manasik</th>
                            <th>Tanggal Keberangkatan</th>
                            <th>Tanggal Tiba di tanah Air</th>
                            <th>Status Transaksi</th>
                            <th>Status Pembayaran</th>
                            <th>Metode Pemabyaran</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($transaction as $tr)
                            <tr>
                                <td>{{$tr->id}}</td>
                                <td>{{$tr->user->name}}</td>
                                <td>{{$tr->user->email}}</td>
                                <td>{{$tr->user->telephone}}</td>
                                <td>{{$tr->user->created_at}}</td>
                                <td>{{$tr->packet->id}}</td>
                                <td>{{$tr->packet->packet_title}}</td>
                                <td>{{$tr->packet->detail->getDateManasik()}}</td>
                                <td>{{$tr->packet->detail->getDateTakeoff()}}</td>
                                <td>{{$tr->packet->detail->getDateReturn()}}</td>
                                <td>{{$tr->status->status_name}}</td>
                                <td>{{$tr->payment->status->status_name}}</td>
                                <td>{{$tr->payment->bank->method->payment_name}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endif
    </div>
@endsection
@push('js')
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
    <script>
        $(document).ready( function () {
            const queryString = window.location.search;
            const urlParams = new URLSearchParams(queryString);
            $('#report').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'excel',
                        filename: 'Transaksi tahun '+ urlParams.get('start_date') +' sampai tahun ' + urlParams.get('end_date'),
                        title: 'Daftar Transaksi'
                    },
                ],
            } );
        } );
    </script>
@endpush
