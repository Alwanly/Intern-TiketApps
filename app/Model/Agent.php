<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    protected $table='agents';

    public function agenttype(){
        return $this->belongsTo('App\AgentType');
    }
    public function bank(){
        return $this->belongsTo('App\BankMaster');
    }
    public function status(){
        return $this->belongsTo('App\StatusMaster');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
}
