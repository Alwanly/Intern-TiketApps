<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    protected $table = 'transaction_details';

    protected $fillable=[
        'transaction_id','jamaah_name','jamaah_gender','jamaah_telephone','jamaah_path_photoktp'];

    public function transaction(){
        return $this->belongsTo('App\Transaction');
    }
}
