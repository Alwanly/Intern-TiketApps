<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MasterDataController extends Controller
{
    public function index(){
        return view('admin.masterData.index');
    }
    public function createMethod(){
        return view('admin.masterData.createMethod');
    }
    public function createRoomType(){
        return view('admin.masterData.createRoomType');
    }
    public function createAirlines(){
        return view('admin.masterData.createAirlines');
    }
    public function createCategory(){
        return view('admin.masterData.createCategory');
    }
}
