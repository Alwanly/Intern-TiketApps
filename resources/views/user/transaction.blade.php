@extends('layouts.appUser')

@section('content')
    <div class="transaction-payment">
            <div class="container">
                    <div class="card">
                    <h4 class="text-title mb-3 pl-4 pr-4">Detail Packet Umroh</h4>
                    <div class="form-group mb-3 pl-4">
                            <h5>{{$price->packet->packet_title}}</h5>
                            <ul class="list-group">
                                <li class="list-group-item">Manasik :{{$price->packet->detail->manasik_date}}</li>
                                <li class="list-group-item">Takeoff : {{$price->packet->detail->takeoff_date}}</li>
                                <li class="list-group-item">Return : {{$price->packet->detail->return_date}}</li>
                            </ul>
                    </div>
                    <hr>
                        <form action="{{route('orderStore')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="price_id" value="{{$price->id}}">
                    <div class="form-group mb-3 pl-4 pr-4" >
                        <h5 class="text-title text-bold">Data Jamaah</h5>
                        <div class="card-ktp">
                        @for($i = 0 ; $i < $price->room->room_capacity ;$i++)
                            <div class="card col-lg-12 col-md-12 col-sm-12 ">
                                <p class="text-bold">Jamaah {{$i+1}}</p>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Full Name</label>
                                    <input name="name_jamaah[]" type="text" class="form-control" placeholder="Alwan">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Gender</label>
                                    <select name="gender_jamaah[]" class="form-control" id="exampleFormControlSelect1">
                                        <option value="Pria">Pria</option>
                                        <option value="Wanita">Wanita</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Phone Number</label>
                                    <input name="number_jamaah[]" type="number" class="form-control" id="" placeholder="08080808">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlFile1">Foto KTP</label>
                                    <input name="ktp_jamaah[]" type="file" class="form-control-file" id="exampleFormControlFile1">
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
                                    <label for="inputEmail4" class="text-title text-bold">Code Agent</label>
                                    <input type="text" class="form-control" id="inputEmail4">
                                </div>
                            </div>
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
                                        <input type="radio" name="bank_id" id="room" value="{{$bank->id}}" >{{$bank->bank_name}}
                                    </label>
                                @endforeach
                            </div>
                        </div>
                    </div>
                        <hr>
                    <div class="form-group row justify-content-center">
                        <div class="form-group col-md-3">
                            <button type="submit"  class="btn btn-custom-secondry btn-block text-uppercase" >purchase
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
    </script>
@endpush
