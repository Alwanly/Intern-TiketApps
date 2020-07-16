<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    protected $table = 'user_details';
    protected $fillable =
        ['user_id','gender','telephone','path_photoprofile','address'];
    public function user(){
        return $this->belongsTo('App\User');
    }
}
