@extends('layouts.appAdmin')

@section('content')
    <div class="container">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2 m-md-2">
                    <div class="col-sm-6 col-md-6">
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <ol class="breadcrumb float-sm-right">
                            <a href="{{route('transactionList')}}" class="text-primary breadcrumb-item active"><u>Daftar Transaksi</u></a>
                            <li class="breadcrumb-item active">Detail Transaksi</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-10">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Transaction Detail</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputEmail4">Name</label>
                            <input type="text" class="form-control" disabled id="inputEmail4" placeholder="{{$transaction->user->name}}">
                        </div>
                        <div class="form-group">
                            <label for="inputEmail4">Packet</label>
                            <input type="text" class="form-control" disabled id="inputEmail4" placeholder="{{$transaction->packet->packet_title}}">
                        </div>
                        <div class="form-group">

                            <label>Payment with Bank</label>
                            <div class="form-row">
                                <div class="form-group col-md-12 col-lg-12">
                                    <input type="text" class="form-control"  disabled id="inputCity" placeholder="{{$transaction->payment->bank->bank_name}}">
                                </div>
                            </div>

                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Status</label>
                            <input type="text" class="form-control" disabled id="inputCity" placeholder="{{$transaction->status->status_name}}">
                        </div>
                        <div class="form-group">
                            <a href="{{route('paymentDetail',['id'=>$transaction->payment->id])}}" class="text-primary breadcrumb-item active"><u>Payment</u></a>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">List Jamaah</h3>


                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0" style="height: 300px;">
                        <table class="table table-head-fixed text-nowrap">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Gender</th>
                                <th>Telephone</th>
                                <th>KTP</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 1 ?>
                                @foreach($transaction->detail as $jamah)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$jamah->jamaah_name}}</td>
                                        <td>{{$jamah->jamaah_gender}}</td>
                                        <td>{{$jamah->jamaah_telephone}}</td>
                                        <td><button type="button" class="btn btn-primary modal-view" data-name="{{$jamah->jamaah_name}}" data-toggle="modal" data-img="{{$jamah->jamaah_path_photoktp}}" data-target="#viewKtp">
                                               View KTP
                                            </button></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="viewKtp" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="name-jamaah">Name Jamaah</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="wrapper-ktp d-flex justify-content-center align-items-center">
                        <div class="wrapper-ktp-img" >
                            <img  id="ktpJamaah" class="img-thumbnail" >
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        $('.modal-view').on('click',function () {
            var name = $(this).data('name');
            var dataImg = $(this).data('img');
            var img =" {{asset('storage/ktpJamaah/')}}"+"/"+dataImg;
            $('#ktpJamaah').attr('src',img);
            document.getElementById('name-jamaah').innerHTML=name;
        })
    </script>
@endpush
