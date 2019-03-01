<?php

use Illuminate\Database\Seeder;

class DepartmentAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departmentadmins')->insert([
            'name_departmentadmins' => 'Phan Đặng Hải Vũ',
            'id_department' => 1,
            'id_user' => 1
        ]);
    }
}
