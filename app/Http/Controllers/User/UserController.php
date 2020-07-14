<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App;
class UserController extends Controller
{
    public function index(){
       $data =App\User::find(1);
       $hasil = json_encode($data);

       echo $hasil;
    }
}
