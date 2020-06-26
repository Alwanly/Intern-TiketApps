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
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-10">
                <div class="card">

                    <div class="card-body">
                        <form action="#">
                            <div class="form-group">
                                <label for="inputCity">KTP</label> <br>
                                <img src="/images/pkaet.jpg" style="width: 300px;height: 150px" class="img-thumbnail" >
                            </div>
                            <div class="form-group">
                                <label for="inputEmail4">Email</label>
                                <input type="email" disabled class="form-control" id="inputEmail4" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="inputEmail4">Name</label>
                                <input type="email" disabled class="form-control" id="inputEmail4" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="">Bank and Account Number</span>
                                    </div>
                                    <input type="text" disabled class="form-control" placeholder="BCA">
                                    <input type="text" disabled class="form-control" placeholder="09090900">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Agent Type </label>
                                <select class="form-control" id="exampleFormControlSelect1">
                                    <option>VIP</option>
                                    <option>VVIP</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Status</label>
                                <select class="form-control" id="exampleFormControlSelect1">
                                    <option>Active</option>
                                    <option>InActived</option>
                                </select>
                            </div>
                            <button type="submit" id="submit" class="btn btn-primary" value="update">Accept</button>
                            <button type="submit" id="submit" class="btn btn-danger" value="update">Decline</button>
                        </form>
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
    </script>
@endpush
