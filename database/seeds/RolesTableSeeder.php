<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'role'=>'jamaah',
            'desc_role'=>'user jamaah yang membeli paket umroh',
            'status_id'=>2
        ]);
        DB::table('roles')->insert([
            'role'=>'admin',
            'desc_role'=>'Mengelola BackEnd Modul Paket Umroh',
            'status_id'=>2
        ]);
    }
}
