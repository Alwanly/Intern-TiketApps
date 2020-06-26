<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index(){
        return view('admin.payment.paymentList');
    }

    public function detail(Request $request){
        return view('admin.payment.paymentDetail');
    }
}
