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
                            <a href="{{route('transactionList')}}"  class="text-primary breadcrumb-item active">List Transaction</a>
                            <li class="breadcrumb-item active">Update Transaction</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        @include('alerts.alert')
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-10">
                <div class="card">
                    <div class="card-header">Create Packet Umroh</div>

                    <div class="card-body">
                        <form action="{{route('packetStore')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            {{-- Banner --}}
                            <div class="form-group">
                                <label for="inputEmail4">Banner</label>
                                <div class="custom-file">
                                    <input name="banner" type="file" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                            </div>
                            {{-- Title --}}
                            <div class="form-group">
                                <label for="inputEmail4">Title</label>
                                <input name="packet_title" type="text" class="form-control" id="inputEmail4" placeholder="Email">
                            </div>
                            {{-- Description --}}
                            <div class="form-group">
                                <label for="inputEmail4">Description</label>
                                <textarea name="packet_desc" class="form-control" aria-label="With textarea" placeholder="Description"></textarea>
                            </div>
                            {{-- Date --}}
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputCity">Date Manasik</label>
                                    <input name="manasik_date" class="date form-control" type="date">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputCity">Date Take Off</label>
                                    <input name="takeoff_date" class="date form-control" type="date">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputCity">Date Return</label>
                                    <input name="return_date" class="date form-control" type="date">
                                </div>
                            </div>
                            {{-- Room Type and Prices --}}
                            <?php $i = 0 ?>
                            <div class="form-group">
                                <div id="input-RoomType">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="">Room Type and Price</span>
                                        </div>
                                        <select name="room_id[]" class="form-control roomType" id="data{{$i}}">
                                            <option selected disabled >Select Room Type</option>
                                            @foreach($rooms as $room)
                                                <option value="{{$room->id}}">{{$room->room_name}}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                    <br>
                                </div>
                                <p class="text-primary" style="cursor: pointer"  onclick="addMore()" href="#">Add more Room Type</p>
                                <p class="text-danger" style="cursor: pointer"  onclick="resetRoom()" href="#">Reset Room Type</p>
                            </div>
                            {{-- Room Type and Prices --}}
                            <div class="form-group">
                                <label>Airlines</label>
                                    <div class="input-group">
                                        <select name="airline_id" class="form-control ">
                                            <option selected disabled >Select Airlines</option>
                                            @foreach($airlines as $al)
                                                <option value="{{$al->id}}">{{$al->airlines_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                            </div>
                            {{-- Categories --}}
                            <div class="form-group">
                                    <label>Categories</label>
                                <div class="form-row">
                                    @foreach($categories as $category)
                                    <div class="form-group col-lg-4">
                                        <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input id="category_id" name="category_id" value="{{$category->id}}" type="radio" aria-label="Checkbox for following text input">
                                            </div>
                                        </div>
                                        <input type="text" disabled class="form-control" aria-label="Text input with checkbox" value="{{$category->category_name}}">
                                    </div>
                                    </div>
                                        @endforeach
                                </div>
                            </div>
                            {{-- Duration and Quota --}}
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputCity">Duration</label>

                                    <input name="duration" type="text" class="form-control" id="inputCity" placeholder="Duration">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputState">Quota</label>
                                    <input name="quota" type="text" class="form-control" id="inputCity" placeholder="Quota">
                                </div>
                            </div>
                            {{-- Note --}}
                            <div class="form-group">
                                <label for="inputEmail4">Note</label>
                                <textarea name="note" class="form-control" aria-label="With textarea" placeholder="Notes"></textarea>
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
  function addMore() {
      {{$i++}}
      document.getElementById('input-RoomType').innerHTML += '  <div class="input-group">\n' +
          '                                        <div class="input-group-prepend">\n' +
          '                                            <span class="input-group-text" id="">Room Type and Price</span>\n' +
          '                                        </div>\n' +
          '                                        <select name="room_id[]" class="form-control roomType" id="data{{$i}}">\n' +
          '                                            <option selected disabled hidden >Select Room Type</option>\n' +
          '                                            @foreach($rooms as $room)\n' +
          '                                                <option value="{{$room->id}}">{{$room->room_name}}</option>\n' +
          '                                                @endforeach\n' +
          '                                        </select>\n' +
          '                                    </div>\n' +
          '                                    <br>'
  }
  function resetRoom() {
    document.getElementById('input-RoomType').innerHTML ='<div class="input-group">\n' +
        '                                    <div class="input-group-prepend">\n' +
        '                                        <span class="input-group-text" id="">Room Type and Price</span>\n' +
        '                                    </div>\n' +
        '                                    <select name="room_id[]" class="form-control roomType" id="data{{$i}}">\n' +
        '                                        <option selected disabled hidden >Select Room Type</option>\n' +
        '                                        @foreach($rooms as $room)\n' +
        '                                            <option value="{{$room->id}}">{{$room->room_name}}</option>\n' +
        '                                            @endforeach\n' +
        '                                    </select>\n' +
        '                                </div> '+'<br>'
  }
  $(document).ready(function () {
      $('.roomType').change(function () {
          console.log("sdsds");
      })
  })
</script>
@endpush
