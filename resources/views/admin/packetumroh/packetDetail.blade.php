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
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        <form action="#">
                            <div class="form-group col-md-12">
                                <img src="/images/pkaet.jpg" class="img-thumbnail" >
{{--                                <div class="custom-file">--}}
{{--                                    <input type="file" class="custom-file-input" id="exampleInputFile">--}}
{{--                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>--}}
{{--                                </div>--}}
                            </div>
                            <div class="form-group">
                                <label for="inputEmail4">Title</label>
                                <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="inputEmail4">Description</label>
                                <textarea class="form-control" aria-label="With textarea" placeholder="Description"></textarea>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputCity">Date Manasik</label>
                                    <input class="date form-control" type="date">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputCity">Date Take Off</label>
                                    <input class="date form-control" type="text">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputCity">Date Return</label>
                                    <input class="date form-control" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="">Room Type and Price</span>
                                    </div>
                                    <input type="text" class="form-control">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label>Categories</label>
                                    <div class="form-row">
                                        <div class="form-group col-md-4 col-lg-4">
                                            <input type="text" class="form-control" id="inputCity">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputCity">Duration</label>
                                    <input type="text" class="form-control" id="inputCity">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputState">Quota</label>
                                    <input type="text" class="form-control" id="inputCity">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail4">Note</label>
                                <textarea class="form-control" aria-label="With textarea" placeholder="Description"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Status</label>
                                <select class="form-control" id="exampleFormControlSelect1">
                                    <option>Active</option>
                                    <option>deActive</option>
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
    $('#submit').click(function () {
        var data = $(this).val();
        alert(data);
    });
</script>
@endpush
