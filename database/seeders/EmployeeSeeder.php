<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Employee;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Employees')->insert([
            'ID_Dpm'        =>  1,
            'Fullname'      =>  'Huỳnh Tiểu Phụng',
            'DoB'           =>  '2000-03-20',
            'Gender'        =>  'Nữ',
            'Phone'         =>  '0947036090',
            'Mail'          =>  'htphung2000@gmail.com',
            'Address'       =>  'Xuân Khánh, Ninh Kiều, Cần Thơ',
            'Position_Emp'  =>  1,
            'Avatar'        =>  '/storage/Avatar/beauty_20210130122612.jpg',
            'created_at'    =>  now(),
            'updated_at'    =>  now()
        ],
        [
            'ID_Dpm'        =>  2,
            'Fullname'      =>  'Trần Thanh Trúc',
            'DoB'           =>  '2000-08-14',
            'Gender'        =>  'Nữ',
            'Phone'         =>  '0946256462',
            'Mail'          =>  'tranthanhtruc@gmail.com',
            'Address'       =>  'Cái Răng, Cần Thơ',
            'Position_Emp'  =>  2,
            'Avatar'        =>  '/storage/Avatar/2021-05-05162021864954680.jpg',
            'created_at'    =>  now(),
            'updated_at'    =>  now()
        ]);

    }
}
