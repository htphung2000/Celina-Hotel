<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Department;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Departments')->insert([
            'DPM_Name'      =>  'Chi nhánh Cần Thơ',
            'DPM_Phone'     =>  '0292123456',
            'DPM_Address'   =>  'Đường 3/2, phường Xuân Khánh, quận Ninh Kiều, TP Cần Thơ',
            'created_at'    =>  now(),
            'updated_at'    =>  now()
        ]);
        DB::table('Departments')->insert([
            'DPM_Name'      =>  'Chi nhánh TP Hồ Chí Minh',
            'DPM_Phone'     =>  '0123456789',
            'DPM_Address'   =>  'Quận Tân Phú, TP HCM',
            'created_at'    =>  now(),
            'updated_at'    =>  now()
        ]);
        
    }
}
