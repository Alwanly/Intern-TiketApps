@extends('layouts.appUser')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="#"> List Packet Umroh</a></li>
                        <li class="breadcrumb-item">Detail Packet Umroh</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-4">
                <img src="/images/banner.jpg" style="width: 350px; border-radius: 10px;">
            </div>
            <div class="col-8">
                <div class="card">
                    <div class="container" style="padding: 10px">
                    <h3 class="text-tilte">Packet Umroh Murah</h3>
                    <hr>
                    <div class="row">
                        <div class="card-item col-lg-2 col-md-2 col-sm-12">
                            <h4 class="text-subtitle">Date</h4>
                        </div>
                        <div class="card-item col-lg-10 col-md-10 col-sm-12">
                            <ul class="list-group">
                                <li class="list-group-item">Manasik : 06/06/2020</li>
                                <li class="list-group-item">Takeoff : 06/06/2020</li>
                                <li class="list-group-item">Return : 06/06/2020</li>
                            </ul>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="card-item col-lg-2 col-md-2 col-sm-12">
                            <h4 class="text-subtitle">Airline</h4>
                        </div>
                        <div class="card-item col-lg-10 col-md-10 col-sm-12">
                            <p>Garuda</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="card-item col-lg-2 col-md-2 col-sm-12">
                            <h4 class="text-subtitle">Price</h4>

                        </div>
                        <div class="card-item col-lg-10 col-md-10 col-sm-12">
                           <h3 class="text-tilte">Rp 100.000.000</h3>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="card-item col-lg-2 col-md-2 col-sm-12">
                            <h4 class="text-subtitle">Room Type</h4>

                        </div>
                        <div class="card-item col-lg-10 col-md-10 col-sm-12">
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                @for($i = 0 ; $i<3 ;$i++)

                                <label class="btn btn-custom-outline">
                                    <input type="radio" name="options" id="option1" > 1 Room 4 Poeple
                                </label>
                                    @endfor
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="card-item col-lg-2 col-md-2 col-sm-12">
                            <h4 class="text-subtitle">Description</h4>
                        </div>
                        <div class="card-item col-lg-10 col-md-10 col-sm-12">
                           <p class="text-justify">Assalamualaikum, Sobat Serbakuis! Bagi kalian yang ingin menjalankan umroh di bulan Ramadan tahun ini, beli saja paket perjalanannya lewat Blibli, karena telah disediakan penawaran spesial berupa hadiah Yamaha Mio S! Baca syarat dan ketentuannya terlebih dahulu di bawah ini ya!</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="card-item col-lg-2 col-md-2 col-sm-12">
                            <h4 class="text-subtitle">Note</h4>
                        </div>
                        <div class="card-item col-lg-10 col-md-10 col-sm-12">
                            <p class="text-justify">Assalamualaikum, Sobat Serbakuis! Bagi kalian yang ingin menjalankan umroh di bulan Ramadan tahun ini, beli saja paket perjalanannya lewat Blibli, karena telah disediakan penawaran spesial berupa hadiah Yamaha Mio S! Baca syarat dan ketentuannya terlebih dahulu di bawah ini ya!</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="card-item col-lg-6 col-md-6 col-sm-12 d-flex justify-content-center">
                            <div class="col-auto">
                            <div class="input-group">
                                  <span class="input-group-btn">
                                      <button type="button" onclick="count('minus')" id="btn-number" class="btn btn-danger btn-number"  data-type="minus" data-field="quant[2]">
                                        <span class="nav-icon fa fa-minus-square"></span>
                                      </button>
                                  </span>
                                    <input type="number" id="counter" name="quant[2]" class="text-center" style="width: 100px;" value="1" min="1" max="100" disabled>
                                    <span class="input-group-btn">
                                      <button type="button" onclick="count('add')" id="btn-number" met class="btn btn-success btn-number" data-type="plus" data-field="quant[2]">
                                          <span class="nav-icon fa fa-plus-square"></span>
                                      </button>
                                  </span>
                                </div>
                            </div>
                        </div>
                        <div class="card-item col-lg-6 col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-6 d-flex justify-content-center">
                                   <a href="/purchase"  class="btn btn-custom-secondry btn-block">Order</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
<script>
    function count(value) {
        var total = document.getElementById('counter').value;
        if(value === 'add'){
            total++;
        }else if(value === 'minus' && total != 1){
            total--;
        }
        document.getElementById('counter').value = total;
    }
</script>
@endpush
