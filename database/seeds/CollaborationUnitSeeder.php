<?php

use Illuminate\Database\Seeder;

class CollaborationUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('collaboration_units')->insert([
            'name' => 'Khoa đào tạo quốc tế - Đại học Duy Tân',
            'phone_number' => '032299913',
            'email' => 'contact@dtu.com',
            'address' => 'Đà Nẵng',
            'description' => 'Mô tả ngắn',
            'is_active' => config('setting.active.is_active'),
        ]);
    }
}
