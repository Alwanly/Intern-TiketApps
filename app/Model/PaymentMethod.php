<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    protected $table = 'payment_methods';
    protected $fillable = [
        'payment_name','status_id'
    ];
    public function status(){
        return $this->belongsTo('App\StatusMaster');
    }

    public function bank(){
        return $this->hasMany('App\BankMaster','method_id','id');
    }
}
