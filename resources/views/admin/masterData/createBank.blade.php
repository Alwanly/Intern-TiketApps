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
                <div class="card-header">Create Bank</div>

                <div class="card-body">
                    <form action="{{route('storeBank')}}" method="post">
                        @csrf
                        {{-- Bank --}}
                        <div class="form-group">
                            <label for="inputEmail4">Code Bank</label>
                            <input name="bank_code" type="text" class="form-control" id="inputEmail4" placeholder="Name Category">
                        </div>
                        {{-- Bank --}}
                        <div class="form-group">
                            <label for="inputEmail4">Name Bank</label>
                            <input name="bank_name" type="text" class="form-control" id="inputEmail4" placeholder="Name Category">
                        </div>

                        {{-- Payment Method --}}
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Payment Method</label>
                            <select name="method_id" class="form-control" id="exampleFormControlSelect1">
                                    @foreach($methods as $m)
                                    <option value="{{$m->id}}">{{$m->payment_name}}</option>
                                    @endforeach
                            </select>
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
