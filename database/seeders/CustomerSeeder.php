<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Department;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Customers')->insert([
            'Username'      =>  'truc123',
            'Pass'          =>  hash::make('123456789'),
            'CTM_Name'      =>  'Trần Thanh Trúc',
            'CTM_DoB'       =>  '2001-08-24',
            'CTM_Gender'    =>  'Nữ',
            'CTM_Phone'     =>  '0123456789',
            'CTM_Mail'      =>  '',
            'CTM_Address'   =>  'Cần Thơ',
            'CTM_Avatar'    =>  '/sources/img/Avatar/2021-05-05162021864954680.jpg',
            'created_at'    =>  now(),
            'updated_at'    =>  now()
        ]);
    }
}
