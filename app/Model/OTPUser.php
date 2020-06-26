<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OTPUser extends Model
{
    protected $table = 'otp_users';
    public function status(){
        return $this->belongsTo('App\StatusMaster');
    }

    public function user(){
        return $this->hasOne('App\User');
    }
}
