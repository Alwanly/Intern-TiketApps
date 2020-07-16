@extends('layouts.appUser')

@section('content')
    <div class="container">
        <div class="account-profile-wrapper">
            <div class="row">
                <div class="col-4 section-profile">
                    <div class="profile-img-container">
                        <div class="profile-img-wrapper">
                            @if($user->userDetail->path_photoprofile == "")
                            <img src="/images/profil_default.png" alt="profile">
                            @else
                                <img src="{{ asset('storage/profile/'.$user->userDetail->path_photoprofile) }}" alt="profile pic">
                            @endif
                        </div>
                    </div>
                    <input type="file" id="file-profile" hidden formenctype="multipart/form-data">
                    <label  onclick="uploadProfile()" id="btn-upload" class="btn btn-custom-primary"  hidden>Upload Photo</label>
                </div>
                <div class="col-8">
                    <div class="detail-user-container ">
                        <div class="agent-wrapper">

                            <ul class="list-group">
                                @if($user->agent != '')
                                    @if($user->agent->status_id == 2 || $user->agent->type->title != "Menuggu Konfirmasi")
                                <li class="list-group--custom-item ">Agent : <p class="status-agent">{{$user->agent->code_agent}}</p></li>
                                        @elseif($user->agent->type->title == "Menuggu Konfirmasi" || $user->agent->type->title == "Ditolak" )
                                        <li class="list-group--custom-item ">Status Agent : <p>{{$user->agent->type->title}}</p></li>
                                        @endif
                                        <li class="list-group--custom-item"><span><i id="icon-kaabah" class="fa fa-kaaba "></i></span> </li>
                                @else
                                <li class="list-group--custom-item"><button type="button" data-toggle="modal" data-target="#modal_agent" class="btn btn-custom-primary">Agent</button></li>
                                @endif
                            </ul>
                        </div>
                        <div class="detail-user-profile">
                            <h4>Information User</h4>
                                <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-8">
                                        <input type="text" disabled  class="form-control-plaintext data-edit" id="name" value="{{$user->name}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-2 col-form-label">Phone Number</label>
                                    <div class="col-8">
                                        <input type="number" disabled  class="form-control-plaintext data-edit" id="telephone" value="{{$user->userDetail->telephone}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-2 col-form-label">Gender</label>
                                    <div class="col-8">
                                        <input type="text"  disabled class="form-control-plaintext data-edit" id="gender" value="{{$user->userDetail->gender}}">
                                        <div id="genderOption" hidden >
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="gender" id="gender1" value="Pria" >
                                                <label class="form-check-label" for="inlineRadio1">Pria</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="gender2" value="Wanita" >
                                            <label class="form-check-label" for="inlineRadio2">Wanita</label>
                                        </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-2 col-form-label">Address</label>
                                    <div class="col-8">
                                        <textarea  class="form-control-plaintext data-edit" disabled id="address" rows="3" placeholder="address">{{$user->userDetail->address}}</textarea>
                                    </div>
                                </div>
                            <hr>
                        </div>
                        <div class="detail-user-account">
                            <h4>Information Account</h4>
                                <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-8">
                                        <input type="email" readonly disabled class="form-control-plaintext" id="staticEmail" value="{{$user->email}}">
                                    </div>
                                </div>

                            <hr>
                        </div>
                        <div class="detail-button text-center">
                            <button id="edit"  class="btn btn-outline-success" onclick="edit()">Edit</button>
                            <button id="cancel" class="btn btn-outline-danger" hidden onclick="saveAndcancel()" >Cancel</button>
                            <button id="save" class="btn btn-success" hidden onclick="submit()">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--Modal Agent--}}
    <div class="modal fade mb-6" id="modal_agent" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel" >Payment Confirm</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formAgent"  role="form" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Bank</label>
                            <select name="bank_id" class="form-control" id="exampleFormControlSelect1" required>
                                @foreach($banks as $bank)
                                    <option value="{{$bank->id}}">{{$bank->bank_name}}</option>
                                    @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Card Number</label>
                            <input name="norekening" type="number" class="form-control" id="" placeholder="08080808" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Name</label>
                            <input name="name_rekening" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Alwan" required>
                        </div>
                        <div class="form-group">
                            <label for="">Photo KTP</label>
                            <div class="input-group mb-3">
                                <div class="custom-file">
                                    <input  name="photo" type="file" class="custom-file-input" id="photo" required>
                                    <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Choose file</label>
                                </div>
                            </div>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-outline-danger" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        $(document).ready(function () {
            var status = '<?php if($user->agent != " ")  echo $user->agent->type->title; ?>';
            if(status == 'VIP'){
                $('#icon-kaabah').addClass('text-success');
            }
        });
        function submit() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        dataF = {
            "name": $("#name").val(),
            "gender": $("input[name='gender']:checked").val(),
            "phone":$('#telephone').val(),
            "address": $('#address').text(),
        };
        var formD = new FormData();
        var file = $('#file-profile')[0].files[0];
        formD.append('name',dataF.name);
        formD.append('gender',dataF.gender);
        formD.append('phone',dataF.phone);
        formD.append('address',dataF.address);
        formD.append('file',file);

        $.ajax({
            type:'POST',
            url:'{{route('account.update')}}',
            data:formD,
            processData: false,
            contentType: false,
            dataType: 'json',
            success:function (ss) {
                console.log(ss);
                if (ss.status){
                    alert('Update Berhasil');
                    saveAndcancel();
                }
            },
            error:function () {
                alert('gender');
            }
        });

        }
        function uploadProfile() {
                document.getElementById('file-profile').click();
        }
        function edit() {
            const inputEl = document.querySelectorAll('.data-edit');

            inputEl.forEach(element =>{
                element.classList.replace('form-control-plaintext','form-control');
                element.removeAttribute('disabled');
            });
            document.getElementById('gender').setAttribute('hidden','');
            document.getElementById('genderOption').removeAttribute('hidden');
            const save = document.getElementById('save');
            const edit = document.getElementById('edit');
            const cancel = document.getElementById('cancel');
            const upload = document.getElementById('btn-upload');
            upload.removeAttribute('hidden');
            save.removeAttribute('hidden');
            cancel.removeAttribute('hidden');
            edit.setAttribute('hidden','');

        }
        function saveAndcancel() {
            location.reload();
        }

        $('#formAgent').submit(function (e) {
            e.preventDefault();
            console.log('bisa');
            var dataForm = new FormData(this);
            var file = $('#photo')[0].files[0];
            dataForm.append('file',file,'photo');
            $.ajax({
                type:"POST",
                url :"{{route('agent')}}",
                data:dataForm,
                processData: false,
                contentType: false,
                dataType: 'json',
                success:function (response) {
                    var status = response.status;
                    if(status) {
                         location.reload();
                         return false;
                    }else{
                        alert('error model')
                    }

                },
                error:function (e) {
                    alert('error connection')
                }
            });

        })

    </script>
@endpush
