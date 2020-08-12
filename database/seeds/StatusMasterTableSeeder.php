<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class StatusMasterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status_name =['Active','inActive','Menunggu Pembayaran','Pembayaran Berhasil','Menunggu Waktu Manasik',
            'Menunggu Waktu Berangkat','Dalam Perjalanan Umroh','Tiba di Tanah Air','Belum Dibayar','Menunggu Konfirmasi',
            'Sudah Dibayar','Pembayaran Ditolak','Pembayaran Gagal','Pembayaran Expired','Ditolak','Menunggu Verifikasi'];
        $status_code =['sa','sa','st','st','st','st','st','st','sp','sp','sp','sp','sp','sp','sag','sag'];
        for ($i = 2;$i<= 17 ;$i++){
            DB::table('status_masters')->insert([
                'id'=>$i,
                'status_code'=>$status_code[$i],
                'status_name'=>$status_name['$i']
            ]);
        }
    }
}
