@extends('layouts.appUser')


@section('content')
    <div class="payment-confirm">
        {{--Toast --}}
        <div class="position-relative w-100 d-flex flex-column p-4">
            <div class="toast ml-auto" role="alert" data-delay="700" data-autohide="false" >
                <div class="toast-header">
                    <strong class="mr-auto text-primary">Toast</strong>
                    <small class="text-muted">3 mins ago</small>
                    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="toast-body bg-success"> Payment Confirm Success </div>
            </div>
        </div>
        <div class="container ">
            <div class="card">
                <div class="detail-payment text-center">
                    <h4>Jumlah yang harus dibayar</h4>
                    <h2>Rp.100.000.000</h2>
                    <h3>Waktu Pembayaran</h3>
                    <h3>12:24:34</h3>
                </div>
            </div>
            <div class="card">
                <div class="method-payment">
                    <h4 class="p-3 ">Payment Method</h4>
                    <div class="row mp-group pl-3 mb-2">
                        <div class="col-2">
                            <label>Bank</label>
                        </div>
                        <div class="col-auto">
                            :
                        </div>
                        <div class="col-auto">
                            <p>Mandiri</p>
                        </div>
                    </div>
                    <div class="row mp-group pl-3 mb-2">
                        <div class="col-2">
                            <label>Bank Code </label>
                        </div>
                        <div class="col-auto">
                            :
                        </div>
                        <div class="col-auto">
                            <p>08080</p>
                        </div>
                    </div>
                    <div class="row mp-group pl-3 mb-2">
                        <div class="col-2">
                            <label>No Rekening </label>
                        </div>
                        <div class="col-auto">
                            :
                        </div>
                        <div class="col-auto">
                            <p>000000000</p>
                        </div>
                    </div>
                    <div class="row mp-group pl-3 mb-2">
                        <div class="col-2">
                            <label>Atas Nama</label>
                        </div>
                        <div class="col-auto">
                            :
                        </div>
                        <div class="col-auto">
                            <p>Toko</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="method-payment">
                    <h4 class="p-3 ">Status Payment</h4>
                    <p class="pl-4">Sudah Bayar</p>
                </div>
            </div>
            <div class="text-center">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal_confirm">
                    Payment Confirm
                </button>
            </div>
        </div>
    </div>
    <!-- Modal jamaah -->
    <div class="modal fade mb-6" id="modal_confirm" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel" >Payment Confirm</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Bank</label>
                                <select class="form-control" id="exampleFormControlSelect1">
                                    <option>BCA</option>
                                    <option>Mandiri</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Card Number</label>
                                <input type="number" class="form-control" id="" placeholder="08080808">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Name</label>
                                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Alwan">
                            </div>
                           <div class="form-group">
                               <label for="">Photo Invoice</label>
                               <div class="input-group mb-3">
                                   <div class="custom-file">
                                       <input type="file" class="custom-file-input" id="inputGroupFile02">
                                       <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Choose file</label>
                                   </div>
                               </div>
                           </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancel</button>
                        <button type="button" id="save" class="btn btn-success">Submit</button>
                    </div>
                </div>
            </div>
        </div>
@endsection
@push('js')
    <script>
        $(document).ready(function(){
            $('#save').click(function () {
                $(".toast").toast('show');
                $('#modal_confirm').modal('hide');
            })
        });
    </script>
@endpush
