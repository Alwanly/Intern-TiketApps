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
                            <router-link to="/packet" class="breadcrumb-item active">Daftar Packet Umroh</router-link>
                            <li class="breadcrumb-item active">Detail Packet Umroh</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-10">
                <div class="card">
                    <div class="card-header">Edit Packet</div>

                    <div class="card-body">
                        <form action="{{route('packetUpdate',['id'=>$packets->id])}}" method="post">
                            @csrf
                            @method('put')
                            <div class="form-group col-md-12">
                                <div class="wrapper-banner" style="width: 100%; height: 200px; position: relative; display: flex; align-items: center; justify-content: center ">
                                    <div class="wrapper-banner-img" style="width: 45vh; height: 25vh">
                                        <img style="width: 100%;height: 100%" src="{{ asset('storage/bannerPacket/'.$packets->path_bannerpacket) }}" class="img-thumbnail" alt="{{$packets->path_bannerpacket}}" >
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail4">Title</label>
                                <input name="packet_title" type="text" class="form-control" id="inputEmail4" value="{{$packets->packet_title}}">
                            </div>
                            <div class="form-group">
                                <label for="inputEmail4">Description</label>
                                <textarea name="packet_desc" class="form-control" aria-label="With textarea" >{{$packets->packet_desc}}</textarea>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputCity">Date Manasik</label>
                                    <input name="manasik_date" class="date form-control" type="date" value="{{$packets->detail->manasik_date}}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputCity">Date Take Off</label>
                                    <input name="takeoff_date" class="date form-control" type="date" value="{{$packets->detail->takeoff_date}}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputCity">Date Return</label>
                                    <input name="return_date" class="date form-control" type="date" value="{{$packets->detail->return_date}}">
                                </div>
                            </div>
                            @foreach($packets->price as $pr)
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="">Room Type and Price</span>
                                    </div>
                                    <input name="room_id" type="text" class="form-control" value="{{$pr->room->room_name}}">
                                    <input name="price_id" type="text" class="form-control" value="{{$pr->room->room_price}}">
                                </div>
                            </div>
                            @endforeach
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label>Categories</label>
                                    <div class="form-row">
                                        <div class="form-group col-md-4 col-lg-4">
                                            <input name="category_id" type="text" class="form-control" id="inputCity" value="{{$packets->category->category_name}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputCity">Duration</label>
                                    <input name="duration" type="text" class="form-control" id="inputCity" value="{{$packets->detail->duration}}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputState">Quota</label>
                                    <input type="text" class="form-control" id="inputCity" name="quota" value="{{$packets->detail->quota}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail4">Note</label>
                                <textarea class="form-control" aria-label="With textarea" name="note"> {{$packets->detail->note}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="inputCity">Current Status</label>
                                <input disabled type="text" class="form-control" id="inputCity" name="" value="{{$packets->status->status_name}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Status</label>
                                <select name="status_id" class="form-control" id="exampleFormControlSelect1">
                                    @foreach($status as $st)
                                        <option value="{{$st->id}}">{{$st->status_name}}</option>
                                        @endforeach
                                </select>
                            </div>
                            <button type="submit" id="submit" class="btn btn-primary" value="update">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
<script>

</script>
@endpush
