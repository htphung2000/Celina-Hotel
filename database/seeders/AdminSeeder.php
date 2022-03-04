<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Admins')->insert([
            'ID_Admin'  =>  1,
            'Email'     =>  'htphung2000@gmail.com',
            'Password'  =>  hash::make('phung20032000'),
            'created_at'=>  now(),
            'updated_at'=>  now()
        ]);
    }
}
