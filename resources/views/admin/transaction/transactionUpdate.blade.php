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
                            <a href="{{route('packetList')}}"  class="text-primary breadcrumb-item active">List Packet Umroh</a>
                            <li class="breadcrumb-item active">Create Packet Umroh</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-10">
                <div class="card">
                    <div class="card-header">Create Packet Umroh</div>

                    <div class="card-body">
                        <form>

                            {{-- Title --}}
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Packet</label>
                                <select class="form-control" id="exampleFormControlSelect1">
                                    <option selected>Select Packet</option>
                                    <option>Packet Umroh Murah</option>
                                    <option>Packet Umroh VIP</option>
                                </select>
                            </div>
                            {{-- Date --}}
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputCity">Date Manasik</label>
                                    <input class="date form-control" type="text" placeholder="DD/MM/YYYY">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputCity">Date Take Off</label>
                                    <input class="date form-control" type="text" placeholder="DD/MM/YYYY">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputCity">Date Return</label>
                                    <input class="date form-control" type="text" placeholder="DD/MM/YYYY">
                                </div>
                            </div>
                            {{-- Status --}}
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Status Now</label>
                                <input class="date form-control" type="text" placeholder="Menunggu Waktu Manasik">
                            </div>

                            {{-- Status --}}
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Status Update</label>
                                <select class="form-control" id="exampleFormControlSelect1">
                                    <option>activated</option>
                                    <option>inactivated</option>
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
@endpush
