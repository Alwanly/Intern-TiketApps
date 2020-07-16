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
                            <router-link to="/packet" class="breadcrumb-item active">List Agent</router-link>
                            <li class="breadcrumb-item active">Verification Agent</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        @include('alerts.alert')
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-10">
                <div class="card">

                    <div class="card-body">
                        <form action="{{route('agentApprove')}}" method="post">
                            @csrf
                            <input type="hidden" name="agent_id" value="{{$agent->id}}">
                            <div class="form-group">
                                <label for="inputCity">KTP</label> <br>
                                <button type="button" class="btn btn-primary modal-view" data-name="{{$agent->user->name}}" data-toggle="modal" data-img="{{$agent->path_photoktp}}" data-target="#viewKtp">
                                    View KTP
                                </button>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail4">Email</label>
                                <input type="email" disabled class="form-control" id="" value="{{$agent->user->email}}">
                            </div>
                            <div class="form-group">
                                <label for="inputEmail4">Name</label>
                                <input type="text" disabled class="form-control" id="" value="{{$agent->user->name}}">
                            </div>

                            <div class="form-group">
                                <label for="inputEmail4">Bank</label>
                                <input type="text" disabled class="form-control" id="" value="{{$agent->bank->bank_name}}">
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="">Name and Number Account Card</span>
                                    </div>
                                    <input type="text" disabled class="form-control" value="{{$agent->name_rekening}}">
                                    <input type="text" disabled class="form-control" value="{{$agent->norekening}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail4">Current Type</label>
                                <input type="text" disabled class="form-control" id="" value="{{$agent->type->title}}">
                            </div>
                            <div class="form-group">
                                <label for="inputEmail4">Current Status</label>
                                <input type="text" disabled class="form-control" id="" value="{{$agent->status->status_name}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Agent Type </label>
                                <select name="agent_type_id" class="form-control" id="exampleFormControlSelect1">
                                    @foreach($agentType as $at)
                                        <option value="{{$at->id}}">{{$at->title}} </option>
                                        @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Status</label>
                                <select name="status_id" class="form-control" id="exampleFormControlSelect1">
                                    @foreach($status as $st)
                                        <option value="{{$st->id}}">{{$st->status_name}}</option>
                                        @endforeach
                                </select>
                            </div>
                            <button type="submit"  name="submit" class="btn btn-primary" value="Accept">Accept</button>
                            <button type="submit"  name="submit" class="btn btn-danger" value="Decline">Decline</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="viewKtp" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="name-jamaah">Name Jamaah</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="wrapper-ktp d-flex justify-content-center align-items-center">
                        <div class="wrapper-ktp-img" >
                            <img  id="ktpJamaah" class="img-thumbnail" >
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $('#submit').click(function () {
            var data = $(this).val();
            alert(data);
        });

        $('.modal-view').on('click',function () {
            var name = $(this).data('name');
            var dataImg = $(this).data('img');
            var img =" {{asset('storage/agentKTP/')}}"+"/"+dataImg;
            $('#ktpJamaah').attr('src',img);
            document.getElementById('name-jamaah').innerHTML=name;
        })
    </script>
@endpush
