<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';

    public function status(){
        return $this->belongsTo('App\StatusMaster');
    }

    public function user(){
        return $this->hasMany('App\User');
    }
}
