<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index(){
        return view('admin.transaction.transactionList');
    }
    public function detail(){
        return view('admin.transaction.transactionDetail');
    }
    public function update(){
        return view('admin.transaction.transactionUpdate');
    }
}
