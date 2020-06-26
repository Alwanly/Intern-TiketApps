<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'Categories';
    public function status(){
        return $this->belongsTo('App\StatusMaster');
    }

    public function packet(){
        return $this->hasMany('App\UmrohPacket');
    }
}
