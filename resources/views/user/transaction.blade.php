@extends('layouts.appUser')

@section('content')
    <div class="transaction-payment">
            <div class="container">
                    <div class="card">
                    <h4 class="text-title mb-3 pl-4 pr-4">Detail Packet Umroh</h4>
                    <div class="form-group mb-3 pl-4">
                            <h5>{{$price->packet->packet_title}}</h5>
                            <ul class="list-group">
                                <li class="list-group-item">Manasik :{{$price->packet->detail->getDateManasik()}}</li>
                                <li class="list-group-item">Takeoff : {{$price->packet->detail->getDateTakeoff()}}</li>
                                <li class="list-group-item">Return : {{$price->packet->detail->getDateReturn()    }}</li>
                            </ul>
                    </div>
                    <hr>
                        <form action="{{route('orderStore')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="price_id" value="{{$price->id}}">
                    <div class="form-group mb-3 pl-4 pr-4" >
                        <h5 class="text-title text-bold">Data Jamaah</h5>
                        <div class="card-ktp">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        @for($i = 0 ; $i < $price->room->room_capacity ;$i++)
                            <div class="card col-lg-12 col-md-12 col-sm-12 ">
                                <p class="text-bold">Jamaah {{$i+1}}</p>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Full Name</label>
                                    <input name="name_jamaah[]" type="text" class="form-control" placeholder="Enter Full Name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Gender</label>
                                    <select name="gender_jamaah[]" class="form-control" id="exampleFormControlSelect1">
                                        <option selected disabled>Select Gender</option>
                                        <option value="Pria">Pria</option>
                                        <option value="Wanita">Wanita</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Phone Number</label>
                                    <input name="number_jamaah[]" type="text" class="form-control" id="" placeholder="Enter phone number" value="{{ old('number_jamaah.*') }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlFile1">Foto KTP</label>
                                    <input name="ktp_jamaah[]" type="file" class="form-control-file" id="" >
                                </div>
                            </div>
                            @endfor
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="container">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="code_agent" class="text-title text-bold">Code Agent</label>
                                    <input name="code_agent"  type="text" class="form-control" id="code-agent">
                                </div>
                                <div class="form-group d-flex align-items-end">
                                    <span id="check-code" class="btn btn-success btn-md text-center">Check</span>
                                </div>
                            </div>
                            <strong hidden id="message-code" class="">pesan</strong>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="container">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4" class="text-title">Total Invoice</label>
                                <h3 class="text-primary text-bold">@currency($price->room->room_price)</h3>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="inputEmail4" class="pl-3 text-title text-bold">Bank</label>
                        <div class="container text-center">
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                @foreach($banks as $bank)
                                    <label id="{{$bank->id}}" class="btn btn-custom-outline radio-price">
                                        <input type="radio" name="bank" id="room" value="{{$bank->id}}" >{{$bank->bank_name}}
                                    </label>
                                @endforeach
                            </div>
                        </div>
                    </div>
                        <hr>
                    <div class="form-group row justify-content-center">
                        <div class="form-group col-md-3">
                            <button type="submit"   class="btn btn-custom-secondry btn-block text-uppercase" >purchase
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            </div>
    </div>
@endsection
@push('js')
    <script>
        $(document).ready(function () {
            var msg = $('#message-code');
            var codeIF = $('#code-agent');
            $('form').submit(function (e) {
                var ss = codeIF.hasClass('is-invalid');
                if(ss){
                    alert('Code in Valid');
                    return  false;

                }
            });
            codeIF.focusin(function () {
                var ss = codeIF.hasClass('is-invalid');
                if(ss) {
                    codeIF.removeClass('is-invalid');
                    msg.attr('class', '');
                    msg.attr('hidden', '');
                }
            });
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#check-code').click(function () {
                var codeA = codeIF.val();

                var dataF = new FormData();
                dataF.append('code',codeA);
                $.post('{{route('checkCodeAgent')}}',{code:codeA})
                    .done(function (response) {
                        msg.removeAttr('hidden');
                        if (response.status){
                            codeIF.addClass('is-valid');
                            codeIF.attr('readonly','');
                            msg.addClass('text-success');
                        }else {
                            codeIF.addClass('is-invalid');
                            msg.addClass('text-danger');
                        }
                        msg.text(response.message);
                }).fail(function () {
                    console.log('tidak bisa');
                })

            })
        });
    </script>
@endpush
