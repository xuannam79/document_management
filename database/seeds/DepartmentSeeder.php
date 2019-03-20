<?php

use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->insert([
            'name' => 'Khoa đào tạo quốc tế',
            'is_active' => 1,
        ]);
        DB::table('departments')->insert([
            'name' => 'Khoa giao thông vận tải',
            'is_active' => 1,
        ]);
    }
}
