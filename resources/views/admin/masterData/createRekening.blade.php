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
                <div class="card-header">Add Rekening</div>

                <div class="card-body">
                    <form action="{{route('storeRekening')}}" method="post">
                        @csrf

                        {{-- Bank --}}
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Bank</label>
                            <select name="bank_id" class="form-control" id="exampleFormControlSelect1">
                                @foreach($banks as $bank)
                                    <option value="{{$bank->id}}">{{$bank->bank_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Bank --}}
                        <div class="form-group">
                            <label for="inputEmail4">No Rekening</label>
                            <input name="norekening" type="text" class="form-control" id="inputEmail4" placeholder="09090909090">
                        </div>

                        {{-- Bank --}}
                        <div class="form-group">
                            <label for="inputEmail4">Name Rekening</label>
                            <input name="rekening_name" type="text" class="form-control" id="inputEmail4" placeholder="TokoHaji">
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
                        <button type="submit" id="submit" class="btn btn-primary" value="update">Create</button>
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
