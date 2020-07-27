@extends('layouts.appUser')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item">List Packet Umroh</li>
                    </ol>
                </nav>
            </div>
        </div>

    </div>
    <div class="container">
        <div class="search p-3 d-flex align-items-center justify-content-center">
            <div class="row">
                <form class="form-inline" method="get" action="{{route('searchPacket')}}">
                    <div class="form-group mb-2">
                        <input type="hidden" name="type" value="search">
                        <select id="type" class="form-control">
                            <option value="name" >Nama</option>
                            <option value="date">Tanggal</option>
                        </select>
                    </div>
                    <div class="form-group mx-sm-3 mb-2">
                        <label for="inputPassword2" class="sr-only">Password</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="search...">
                        <input type="date" hidden disabled name="date" class="form-control" id="date" placeholder="search...">
                    </div>
                    <button type="submit" class="btn btn-primary mb-2"><i class="nav-icon fas fa-search"></i> </button>
                </form>
                <div class="form-inline"></div>
            </div>
            <div class="row ml-4">
                <div class="form-group mb-2">
                    <input type="hidden" id="type-sort" name="type" value="sort">
                    <select id="sort" class="form-control">
                        <option selected disabled>Sort</option>
                        <option value="desc"  data-type="price">Harga Mahal - Murah</option>
                        <option value="asc" data-type="price" >Harga Murah - Mahal </option>
                        <option value="{{\Illuminate\Support\Carbon::now()->toDateString()}}" data-type="date" >Tanggal terdekat </option>
                    </select>
                </div>
            </div>
        </div>
        @if(empty($packets->items()[0]->id))
            <div class="alert alert-warning" role="alert">
                Packet Tidak di temukan
            </div>
        @endif
        <div class="row">
            <div class="col-lg-12 col-md-6 col-sm-12">
                <div class="row">
                    @foreach($packets as $packet)
                        <div class="col-lg-4 d-flex justify-content-center">
                            <div class="card card-product" onclick="location.href='{{ route('detailPacket',['id'=>$packet->id]) }}'"  >
                                <div class="img-brand">
                                    <img class="card-img-top" src="{{$packet->path_bannerpacket}}" alt="Card image cap">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">{{$packet->packet_title}}</h5><br>
                                    <br>
                                    <p class="card-text"> <i class="nav-icon fas fa-calendar-alt"></i> {{ \Illuminate\Support\Carbon::parse($packet->takeoff_date)->translatedFormat('l, d M Y')}} </p>
                                    <br>
                                    <p class="card-text"> @currency($packet->room_price)</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row justify-content-center ">
                    <nav aria-label="Page navigation example">
                        <div class="col-12 text-center">
                            {{$packets->links()}}
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        $('#type').change(function () {
            $type = $(this).val();
            if ($type == 'name'){
                $('#date').attr('hidden','');
                $('#date').attr('disable','');
                $('#name').removeAttr('hidden');
                $('#name').removeAttr('disable');
            }
            if ($type == 'date'){
                $('#name').attr('hidden','');
                $('#name').attr('disable','');
                $('#date').removeAttr('hidden');
                $('#date').removeAttr('disabled');
            }
        });
        $('#sort').change(function () {
            $type = $('#type-sort').attr('value');
            $value = $('#sort').val();
            $name = $('#sort').find(':selected').data('type');
            location.href= '/u/listPacket/search?type='+$type+'&'+$name+'='+$value+'';
        })
    </script>
@endpush('js')
