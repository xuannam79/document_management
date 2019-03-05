<?php

use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('positions')->insert([
            'name' => 'Trưởng đơn vị'
        ]);
        DB::table('positions')->insert([
            'name' => 'Phó đơn vị'
        ]);
        DB::table('positions')->insert([
            'name' => 'Thư kí'
        ]);
        DB::table('positions')->insert([
            'name' => 'Giảng viên'
        ]);
    }
}
