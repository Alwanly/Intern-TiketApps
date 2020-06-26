<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RekeningMaster extends Model
{
    protected $table = 'rekening_masters';

    public function status(){
        return $this->belongsTo('App\StatusMaster');
    }

    public function bank(){
        return $this->belongsTo('App\BankMaster');
    }
}
