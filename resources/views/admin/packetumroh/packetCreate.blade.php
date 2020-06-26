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
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-10">
                <div class="card">
                    <div class="card-header">Create Packet Umroh</div>

                    <div class="card-body">
                        <form>
                            {{-- Banner --}}
                            <div class="form-group">
                                <label for="inputEmail4">Banner</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                            </div>
                            {{-- Title --}}
                            <div class="form-group">
                                <label for="inputEmail4">Title</label>
                                <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                            </div>
                            {{-- Description --}}
                            <div class="form-group">
                                <label for="inputEmail4">Description</label>
                                <textarea class="form-control" aria-label="With textarea" placeholder="Description"></textarea>
                            </div>
                            {{-- Date --}}
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputCity">Date Manasik</label>
                                    <input class="date form-control" type="date">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputCity">Date Take Off</label>
                                    <input class="date form-control" type="date">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputCity">Date Return</label>
                                    <input class="date form-control" type="date">
                                </div>
                            </div>
                            {{-- Room Type and Prices --}}
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="">Room Type and Price</span>
                                    </div>
                                    <select class="form-control" id="exampleFormControlSelect1">
                                        <option selected disabled hidden >Select Room Type</option>
                                        <option>1 Kamar 2 Orang</option>
                                        <option>1 Kamar 4 Orang</option>
                                    </select>
                                    <input type="text" class="form-control" placeholder="Price">
                                </div>
                                <br>
                                <div id="input-RoomType"></div>
                                <p class="text-primary" style="cursor: pointer"  onclick="addMore()" href="#">Add more Room Type</p>
                                <p class="text-danger" style="cursor: pointer"  onclick="resetRoom()" href="#">Reset Room Type</p>
                            </div>
                            {{-- Categories --}}
                            <div class="form-group">
                                    <label>Categories</label>
                                <div class="form-row">
                                    <div class="form-group col-lg-4">
                                        <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="checkbox" aria-label="Checkbox for following text input">
                                            </div>
                                        </div>
                                        <input type="text" disabled class="form-control" aria-label="Text input with checkbox" value="VIP">
                                    </div>
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="checkbox" d aria-label="Checkbox for following text input">
                                            </div>
                                        </div>
                                        <input type="text" disabled class="form-control" aria-label="Text input with checkbox" value="VVIP">
                                    </div>
                                    </div>
                                    <div class="form-group col-lg-4">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="checkbox" aria-label="Checkbox for following text input">
                                            </div>
                                        </div>
                                        <input  type="text" disabled class="form-control" aria-label="Text input with checkbox" value="Promo">
                                    </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Duration and Quota --}}
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputCity">Duration</label>
                                    <input type="text" class="form-control" id="inputCity" placeholder="Duration">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputState">Quota</label>
                                    <input type="text" class="form-control" id="inputCity" placeholder="Quota">
                                </div>
                            </div>
                            {{-- Note --}}
                            <div class="form-group">
                                <label for="inputEmail4">Note</label>
                                <textarea class="form-control" aria-label="With textarea" placeholder="Notes"></textarea>
                            </div>
                            {{-- Status --}}
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Status</label>
                                <select class="form-control" id="exampleFormControlSelect1">
                                    <option>activated</option>
                                    <option>inactivated</option>
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
      document.getElementById('input-RoomType').innerHTML +='<div class="input-group">\n' +
          '                                    <div class="input-group-prepend">\n' +
          '                                        <span class="input-group-text" id="">Room Type and Price</span>\n' +
          '                                    </div>\n' +
          '                                    <select class="form-control" id="exampleFormControlSelect1">\n' +
          '                                        <option>Select Room Type</option>\n' +
          '                                        <option>1 Kamar 2 Orang</option>\n' +
          '                                        <option>1 Kamar 4 Orang</option>\n' +
          '                                    </select>\n' +
          '                                    <input type="text" class="form-control" placeholder="Price">\n' +
          '                                </div>\n' +
          '                                <br>'
  }
  function resetRoom() {
    document.getElementById('input-RoomType').innerHTML =''
  }
</script>
@endpush
