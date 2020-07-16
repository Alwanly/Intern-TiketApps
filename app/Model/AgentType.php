<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AgentType extends Model
{
    protected $table ='agent_types';

    protected $fillable = ['title','status_id'];

    public function status(){
        return $this->belongsTo('App\StatusMaster');
    }

    public function agent(){
        return $this->hasMany('App\Agent','agent_type_id','id');
    }
}
