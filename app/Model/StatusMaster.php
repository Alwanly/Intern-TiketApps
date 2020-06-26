<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusMaster extends Model
{
    protected $table = 'status_masters';

    public function user(){
        return $this->hasMany('App\User');
    }

    public function role(){
        return $this->hasMany('App\Role');
    }

    public function agent(){
        return $this->hasMany('App\Agent');
    }

    public function agentType(){
        return $this->hasMany('App\AgentType');
    }

    public function paymentMethod(){
        return $this->hasMany('App\PaymentMethod');
    }

    public function bank(){
        return $this->hasMany('App\BankMaster');
    }

    public function rekening(){
        return $this->hasMany('App\RekeningMaster');
    }

    public function category(){
        return $this->hasMany('App\Category');
    }

    public function airline(){
        return $this->hasMany('App\Airline');
    }

    public function roomType(){
        return $this->hasMany('App\RoomType');
    }

    public function price(){
        return $this->hasMany('App\Price');
    }

    public function packet(){
        return $this->hasMany('App\UmrohPacket');
    }

    public function transaction(){
        return $this->hasMany('App\Transaction');
    }

    public function payment(){
        return $this->hasMany('App\Payment');
    }

    public function paymentConfirm(){
        return $this->hasMany('App\PaymentConfirm');
    }

}
