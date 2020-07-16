<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    protected $table='agents';

    protected $fillable =
        ['user_id','agent_type_id','code_agent','bank_id',
            'norekening','name_rekening', 'path_photoktp','status_id'];

    public function type(){
        return $this->belongsTo('App\AgentType','agent_type_id','id');
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
