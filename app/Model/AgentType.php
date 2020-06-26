<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AgentType extends Model
{
    protected $table ='agent_types';

    public function status(){
        return $this->belongsTo('App\StatusMaster');
    }

    public function agent(){
        return $this->hasMany('App\Agent');
    }
}
