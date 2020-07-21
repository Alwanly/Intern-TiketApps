<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OTPUser extends Model
{
    protected $table = 'otp_users';
    protected $fillable = ['user_id','code_otp','status_id'];
    public function status(){
        return $this->belongsTo('App\StatusMaster');
    }

    public function user(){
        return $this->hasOne('App\User');
    }
}
