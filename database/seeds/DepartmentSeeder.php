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
            'name' => 'Khoa đào tạo quốc tế'
        ]);
        DB::table('departments')->insert([
            'name' => 'Khoa giao thông vận tải'
        ]);
    }
}
