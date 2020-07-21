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
                            <a href="{{route('packetList')}}"  class="text-primary breadcrumb-item active">Daftar Transaksi</a>
                            <li class="breadcrumb-item active">Update Transaksi</li>
                        </ol>
                    </div>
                </div>
            </div>
            @include('alerts.alert')
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-10">
                <div class="card">
                    <div class="card-header">Update Packet Umroh</div>

                    <div class="card-body">
                        <form action="{{route('transactionUpdate')}}" method="post">
                            @csrf
                            {{-- Title --}}
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Packet</label>
                                <select name="packet" class="form-control" id="select-Packet">
                                    <option selected>Select Packet</option>
                                    @foreach($packets as $packet)
                                        <option value="{{$packet->id}}">{{$packet->packet_title}}</option>
                                        @endforeach
                                </select>
                            </div>
                            {{-- Date --}}
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputCity">Date Manasik</label>
                                    <input id="manasik" class="date form-control" type="text"  disabled placeholder="DD/MM/YYYY">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputCity">Date Take Off</label>
                                    <input id="takeoff" class="date form-control" type="text" disabled placeholder="DD/MM/YYYY">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputCity">Date Return</label>
                                    <input id="return" class="date form-control" type="text" disabled placeholder="DD/MM/YYYY">
                                </div>
                            </div>
                            {{-- Status --}}
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Status Update</label>
                                <select name="status" class="form-control" id="exampleFormControlSelect1">
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
        $('#select-Packet').change(function () {
            var packetId = $(this).val();
            $.ajax({
                type:"GET",
                url:"/admin/getPacket/"+packetId,
                dataType:'JSON',
                success:function (data) {
                    $('#manasik').attr('value', data['manasik']);
                    $('#takeoff').attr('value',data['takeoff']);
                    $('#return').attr('value',data['return']);
                },
                error:function () {
                    alert("error");
                }
            })
        })
    </script>

@endpush
