<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    protected $table = 'room_types';
//    protected $hidden = ['status_id','created_at','updated_at'];
    protected $fillable = [
        'room_name','room_capacity','room_price','status_id'
    ];
    public function status(){
        return $this->belongsTo('App\StatusMaster');
    }

    public function price(){
        return $this->hasMany('App\Price','room_id','id');
    }
}
