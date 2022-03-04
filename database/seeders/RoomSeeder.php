<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Room;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Rooms')->insert([
            'ID_Room'       =>  1101,
            'Department_ID' =>  1,
            'Type'          =>  1,
            'created_at'    =>  now(),
            'updated_at'    =>  now()
        ]);

        DB::table('Rooms')->insert([
            'ID_Room'       =>  1201,
            'Department_ID' =>  1,
            'Type'          =>  2,
            'created_at'    =>  now(),
            'updated_at'    =>  now()
        ]);

        DB::table('Rooms')->insert([
            'ID_Room'       =>  2102,
            'Department_ID' =>  2,
            'Type'          =>  1,
            'created_at'    =>  now(),
            'updated_at'    =>  now()
        ]);

        DB::table('Rooms')->insert([
            'ID_Room'       =>  2303,
            'Department_ID' =>  2,
            'Type'          =>  3,
            'created_at'    =>  now(),
            'updated_at'    =>  now()
        ]);

        DB::table('Rooms')->insert([
            'ID_Room'       =>  2401,
            'Department_ID' =>  2,
            'Type'          =>  4,
            'created_at'    =>  now(),
            'updated_at'    =>  now()
        ]);
    }
}
