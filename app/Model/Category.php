<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'Categories';
    protected $fillable = ['category_name','status_id'];

    public function status(){
        return $this->belongsTo('App\StatusMaster');
    }

    public function packet(){
        return $this->hasMany('App\UmrohPacket');
    }
}
