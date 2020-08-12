@extends('layouts.appUser')


@section('content')
    <div class="payment-confirm">
        {{--Toast --}}
        <div class="container ">
            @include('alerts.alert')
            <div class="card">
                <div class="detail-payment text-center">
                    <h4>Jumlah yang harus dibayar</h4>
                    <h2>@currency($payment->nominal)</h2>
                    <h3>Waktu Pembayaran</h3>
                    <h3 id="count"></h3>
                    <div data-countdown="2016/01/01"></div>
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
                            <p>{{$payment->bank->bank_name}}</p>
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
                            <p>{{$payment->bank->bank_code}}</p>
                        </div>
                    </div>
                    <div class="row mp-group pl-3 mb-2">
                        <div class="col-2">
                            <label>No Rekening </label>
                        </div>
                        <div class="col-auto">
                            :
                        </div>
                        @foreach($payment->bank->rekening as $rk)
                        <div class="col-auto">
                            <p>{{$rk->norekening}}</p>
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
                            <p>{{$rk->rekening_name}}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="card pb-3">
                <div class="method-payment">
                    <h4 class="p-3 ">Status Payment</h4>
                    <p class="pl-4" id="status">{{$payment->status->status_name}}</p>
                </div>
            </div>

            <div class="text-center">
                <button type="button" class="btn btn-success" id="btn-confirm" data-toggle="modal" data-target="#modal_confirm" hidden>
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
                    <form role="form" id="paymentConfirm" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                            @csrf
                        <input type="hidden" name="payment_id" value="{{$payment->id}}">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Bank</label>
                                <select name="bank_id" class="form-control" id="exampleFormControlSelect1">
                                    @foreach($banks as $bank)
                                    <option value="{{$bank->id}}">{{$bank->bank_name}}</option>
                                        @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Rekening Number</label>
                                <input name="norekening" type="number" class="form-control" id="" placeholder="08080808" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Rekening Name</label>
                                <input name="rekening_name" type="text" class="form-control"placeholder="" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Photo Transfer</label>
                                <input id="photo" name="photo" type="file" class="form-control-file" required>
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-outline-danger" data-dismiss="modal">Cancel</button>
                        <button type="submit" id="save" class="btn btn-success">Submit</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
@endsection
@push('js')
    <script>
        $(document).ready(function(){
            var statusPayment = document.getElementById('status').innerText;
            if (statusPayment == "Belum dibayar" || statusPayment == "Pembayaran Ditolak"  ) {
                $('#btn-confirm').removeAttr('hidden');
                CountDownTimerExpire('{{$payment->created_at}}', 'count');
            }else {
                document.getElementById('count').innerHTML = '<b>'+statusPayment+'</b> ';
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
            $('#paymentConfirm').submit(function (e) {
                e.preventDefault();
                var dataForm = new FormData(this);
                var file = $('#photo')[0].files[0];
                dataForm.append('file',file,'photo');
                console.log(dataForm);
                  $.ajax({
                    type:"POST",
                    url :"{{route('paymentConfirm')}}",
                    data:dataForm,
                      processData: false,
                      contentType: false,
                      dataType: 'json',
                    success:function (response) {
                        location.reload();
                        return false
                    }
                });

            })

        });

        function CountDownTimerExpire(dt, id)
        {
            var end = new Date('{{\Carbon\Carbon::parse($payment->created_at)->addDay()->toDateTimeString()}}');
            var _second = 1000;
            var _minute = _second * 60;
            var _hour = _minute * 60;
            var _day = _hour * 24;
            var timer;
            function showRemaining() {
                var now = new Date();
                var deadline = end - now;
                if (deadline < 0) {
                    clearInterval(timer);
                    document.getElementById(id).innerHTML = '<b>Expired</b> ';
                    $.ajax({
                        type:"GET",
                        dataType:'json',
                        url :"{{route('paymentExpired',['id'=>$payment->id])}}",
                        data: {'token' :'{!! csrf_token() !!}'},
                        contentType: false,
                        processData: false,
                        success:function (response) {
                         location.reload();
                        }
                    });
                    return;
                }

                var hours = Math.floor((deadline % _day) / _hour);
                var minutes = Math.floor((deadline % _hour) / _minute);
                var seconds = Math.floor((deadline % _minute) / _second);

                document.getElementById(id).innerHTML = hours + 'hrs ';
                document.getElementById(id).innerHTML += minutes + 'mins ';
                document.getElementById(id).innerHTML += seconds + 'secs';

            }
            timer = setInterval(showRemaining, 1000);
        }
    </script>
@endpush
