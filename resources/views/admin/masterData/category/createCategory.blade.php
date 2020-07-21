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
                        <a href="{{route('masterData')}}"  class="text-primary breadcrumb-item active">Daftar Master Data</a>
                        <li class="breadcrumb-item active">Buat Data</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-10">
            <div class="card">
                <div class="card-header">Create Category</div>

                <div class="card-body">
                    <form action="{{route('storeCategory')}}" method="post">
                        @csrf
                        {{-- Title --}}
                        <div class="form-group">
                            <label for="inputEmail4">Name Category</label>
                            <input name="category_name" type="text" class="form-control" id="inputEmail4" placeholder="Name Category" required>
                        </div>
                        {{-- Status --}}
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Status</label>
                            <select name="status_id" class="form-control" id="exampleFormControlSelect1">
                                @foreach($status as $st)
                                    <option value="{{$st->id}}">{{$st->status_name}}</option>
                                    @endforeach
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
