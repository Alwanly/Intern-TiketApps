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
                            <a href="{{route('masterData')}}"  class="text-primary breadcrumb-item active">List Master Data</a>
                            <li class="breadcrumb-item active">Create Data</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-10">
                <div class="card">
                    <div class="card-header">Create Airlines</div>

                    <div class="card-body">
                        <form>
                            {{-- Title --}}
                            <div class="form-group">
                                <label for="inputEmail4">Name Airlines</label>
                                <input type="text" class="form-control" id="inputEmail4" placeholder="Name Airlines">
                            </div>
                            {{-- Status --}}
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Status</label>
                                <select class="form-control" id="exampleFormControlSelect1">
                                    <option>activated</option>
                                    <option>inactivated</option>
                                </select>
                            </div>
                            <button type="submit" id="submit" class="btn btn-primary" value="update">Save</button>
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
