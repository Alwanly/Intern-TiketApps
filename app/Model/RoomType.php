<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    protected $table = 'room_types';

    public function status(){
        return $this->belongsTo('App\StatusMaster');
    }

    public function price(){
        return $this->hasMany('App\Price');
    }
}
