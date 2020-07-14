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
                    <div class="card-header">Edit Room Type</div>

                    <div class="card-body">
                        <form action="{{route('updateRoom',['id'=>$room->id])}}" method="post">
                            @method('PUT')
                            @csrf
                            {{-- Room --}}
                            <div class="form-group">
                                <label for="inputEmail4">Name Room</label>
                                <input type="text" name="room_name" class="form-control" id="inputEmail4" value="{{$room->room_name}}">
                            </div>
                            {{-- Capacity --}}
                            <div class="form-group">
                                <label for="inputEmail4">Capacity</label>
                                <input type="number" name="room_capacity" class="form-control" id="inputEmail4" value="{{$room->room_capacity}}">
                            </div>
                            {{-- Price --}}
                            <div class="form-group">
                                <label for="inputEmail4">Price</label>
                                <input type="number" name="room_price" class="form-control" id="inputEmail4" value="{{$room->room_price}}">
                            </div>

                            <div class="form-group">
                                <label for="inputEmail4">Current Status</label>
                                <input type="text" name="" disabled class="form-control" id="inputEmail4" value="{{$room->status->status_name}}">
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
    </script>
@endpush
