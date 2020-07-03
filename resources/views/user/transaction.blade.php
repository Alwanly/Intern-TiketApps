@extends('layouts.appUser')

@section('content')
    <div class="transaction-payment">
            <div class="container">
                <form>
                    <div class="card">
                    <h4 class="card-header mb-3 pl-4 pr-4">Detail Packet Umroh</h4>
                    <div class="form-group mb-3 pl-4">
                            <h5>Packet Umroh Murah</h5>
                            <ul class="list-group">
                                <li class="list-group-item">Manasik : 06/06/2020</li>
                                <li class="list-group-item">Takeoff : 06/06/2020</li>
                                <li class="list-group-item">Return : 06/06/2020</li>
                            </ul>
                    </div>
                    <hr>
                    <div class="form-group mb-3 pl-4 pr-4">
                        <h5>KTP</h5>
                        @for($i = 0 ; $i <3 ;$i++)
                            <div class="card card-ktp col-lg-6 col-md-6 col-sm-12"  data-toggle="modal" data-target="#modal_jamaah">
                                <div class="row">
                                    <div class="col-auto pl-4 pt-4 pb-4">
                                        <img src="/images/ktp.jpg" alt="ktp" width="100px"/>
                                    </div>
                                    <div class="col-auto pt-4">
                                        <p class="text-danger text-bold">Name Jamaah</p>
                                    </div>
                                </div>
                            </div>
                            @endfor
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="container">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4" class="text-subtitle">Code Agent</label>
                                    <input type="text" class="form-control" id="inputEmail4">
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="container">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4" class="text-tilte">Total Invoice</label>
                                <h3 class="text-primary text-bold">Rp. 100.000.0000</h3>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row justify-content-center">
                        <div class="form-group col-md-3">
                            <a href="#"  class="btn btn-custom-secondry btn-block"  data-toggle="modal" data-target="#modal_payment">Payment Method</a>
                        </div>
                    </div>
                </div>
                </form>
            </div>
    </div>
    <!-- Modal jamaah -->
    <div class="modal fade" id="modal_jamaah" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Detail Jamaah</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Full Name</label>
                                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Alwan">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Gender</label>
                                <select class="form-control" id="exampleFormControlSelect1">
                                    <option>Pria</option>
                                    <option>Wanita</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Phone Number</label>
                                <input type="number" class="form-control" id="" placeholder="08080808">
                            </div>
                           <div class="form-group">
                               <label for="">Foto KTP</label>
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
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    <!-- Modal payment -->
    <div class="modal fade" id="modal_payment" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Payment Method</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-item">
                        <div class="container">
                            <div class="radio-group-bank list-group">
                                <label>
                                    <input type="radio" name="options" id="option1">
                                    <img src="/images/bnk_bca.jpg" width="50px">
                                    <span>BCA</span>
                                </label>
                                <label>
                                    <input type="radio" name="options" id="option1">
                                    <img src="/images/bnk_mandiri.jpg" width="50px">
                                    <span>Mandiri</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancel</button>
                    <button type="button" onclick="location.href='/purchase/payment'" class="btn btn-success">Bayar</button>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('js')
@endpush
