@extends('layouts.appUser')

@section('content')
    <div class="container">
        <div class="account-profile-wrapper">
            <div class="row">
                <div class="col-4 section-profile">
                    <div class="profile-img-container">
                        <div class="profile-img-wrapper">
                            <img src="/images/pkaet.jpg" alt="profile">
                        </div>
                    </div>
                    <input type="file" id="file-profile" hidden>
                    <label  onclick="uploadProfile()" id="btn-upload" class="btn btn-custom-primary">Upload Photo</label>
                </div>
                <div class="col-8">
                    <div class="detail-user-container ">
                        <div class="agent-wrapper">
                            <ul class="list-group">
                                <li class="list-group--custom-item "><p>Code Agent :ASDAS</p></li>
                                <li class="list-group--custom-item"><span><i class="fa fa-kaaba"></i></span> </li>
                                <li class="list-group--custom-item"><button type="button" data-toggle="modal" data-target="#modal_agent" class="btn btn-custom-primary">Agent</button></li>
                            </ul>
                        </div>
                        <div class="detail-user-profile">
                            <h4>Information User</h4>
                                <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-8">
                                        <input type="text" disabled  class="form-control-plaintext data-edit" id="staticEmail" value="Alwan">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-2 col-form-label">Phone Number</label>
                                    <div class="col-8">
                                        <input type="text" disabled  class="form-control-plaintext data-edit" id="staticEmail" value="08*********">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-2 col-form-label">Gender</label>
                                    <div class="col-8">
                                        <input type="text"  disabled  class="form-control-plaintext data-edit" id="staticEmail" value="Pria">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-2 col-form-label">Address</label>
                                    <div class="col-8">
                                        <textarea class="form-control-plaintext data-edit" disabled id="exampleFormControlTextarea1" rows="3" placeholder="address"></textarea>
                                    </div>
                                </div>
                            <hr>
                        </div>
                        <div class="detail-user-account">
                            <h4>Information Account</h4>
                                <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-8">
                                        <input type="text" readonly disabled class="form-control-plaintext" id="staticEmail" value="***@example.com">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-2 col-form-label">Password</label>
                                    <div class="col-8">
                                        <input type="text" readonly disabled class="form-control-plaintext" id="staticEmail" value="***********">
                                    </div>
                                </div>
                            <hr>
                        </div>
                        <div class="detail-button text-center">
                            <button id="edit"  class="btn btn-outline-success" onclick="edit()">Edit</button>
                            <button id="cancel" class="btn btn-outline-danger" hidden onclick="saveAndcancel()" >Cancel</button>
                            <button id="save" class="btn btn-success" hidden onclick="saveAndcancel()">Save</button>
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
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Bank</label>
                            <select class="form-control" id="exampleFormControlSelect1">
                                <option>BCA</option>
                                <option>Mandiri</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Card Number</label>
                            <input type="number" class="form-control" id="" placeholder="08080808">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Name</label>
                            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Alwan">
                        </div>
                        <div class="form-group">
                            <label for="">Photo KTP</label>
                            <div class="input-group mb-3">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="inputGroupFile02">
                                    <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-success">Submit</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        function uploadProfile() {
                document.getElementById('file-profile').click();
        }
        function edit() {
            const inputEl = document.querySelectorAll('.data-edit');

            inputEl.forEach(element =>{
                element.classList.replace('form-control-plaintext','form-control');
                element.removeAttribute('disabled');
            });
            const save = document.getElementById('save');
            const edit = document.getElementById('edit');
            const cancel = document.getElementById('cancel');

            save.removeAttribute('hidden');
            cancel.removeAttribute('hidden');
            edit.setAttribute('hidden','');
        }
        function saveAndcancel() {
            const inputEl = document.querySelectorAll('.data-edit');

            inputEl.forEach(element =>{
                element.classList.replace('form-control','form-control-plaintext');
                element.setAttribute('disabled','');
            });
            const save = document.getElementById('save');
            const edit = document.getElementById('edit');
            const cancel = document.getElementById('cancel');

            save.setAttribute('hidden','');
            cancel.setAttribute('hidden','');
            edit.removeAttribute('hidden');
        }
    </script>
@endpush
