<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RekeningMaster extends Model
{
    protected $table = 'rekening_masters';

    protected $fillable = [
        'id','bank_id','norekening','rekening_name','status_id'
    ];

    public function status(){
        return $this->belongsTo('App\StatusMaster');
    }

    public function bank(){
        return $this->belongsTo('App\BankMaster','bank_id','id');
    }
}
