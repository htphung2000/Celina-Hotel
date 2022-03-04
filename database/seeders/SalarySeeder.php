<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Salary;

class SalarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Salaries')->insert([
            'Position'  =>  'Giám đốc chi nhánh',
            'Sal'       =>  10000000,
            'Allowance' =>  25,
            'created_at'=>  now(),
            'updated_at'=>  now()
        ]);
        DB::table('Salaries')->insert([
            'Position'  =>  'Quản lý',
            'Sal'       =>  8000000,
            'Allowance' =>  20,
            'created_at'=>  now(),
            'updated_at'=>  now()
        ]);
        DB::table('Salaries')->insert([
            'Position'  =>  'Lễ tân',
            'Sal'       =>  6000000,
            'Allowance' =>  18,
            'created_at'=>  now(),
            'updated_at'=>  now()
        ]);
        DB::table('Salaries')->insert([
            'Position'  =>  'Bảo vệ',
            'Sal'       =>  4800000,
            'Allowance' =>  15,
            'created_at'=>  now(),
            'updated_at'=>  now()
        ]);
    }
}
