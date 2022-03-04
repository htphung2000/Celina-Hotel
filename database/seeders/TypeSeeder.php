<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Type;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Types')->insert([
            'Type_Name' =>  'Tiêu chuẩn',
            'Price'     =>  400000,
            'Describe'  =>  'Giường đơn dành cho 1 người',
            'Image'     =>  '/sources/img/Types/TieuChuan.jpg',
            'created_at'=>  now(),
            'updated_at'=>  now()
        ]);

        DB::table('Types')->insert([
            'Type_Name' =>  'Cao cấp',
            'Price'     =>  550000,
            'Describe'  =>  'Giường đôi nhỏ',
            'Image'     =>  '/sources/img/Types/CaoCap.jpg',
            'created_at'=>  now(),
            'updated_at'=>  now()
        ]);

        DB::table('Types')->insert([
            'Type_Name' =>  'Sang trọng',
            'Price'     =>  800000,
            'Describe'  =>  'Giường đôi lớn',
            'Image'     =>  '/sources/img/Types/SangTrong.jpg',
            'created_at'=>  now(),
            'updated_at'=>  now()
        ]);

        DB::table('Types')->insert([
            'Type_Name' =>  'Thượng hạng',
            'Price'     =>  1000000,
            'Describe'  =>  'Giường cỡ lớn',
            'Image'     =>  '/sources/img/Types/ThuongHang.jpg',
            'created_at'=>  now(),
            'updated_at'=>  now()
        ]);
    }
}
