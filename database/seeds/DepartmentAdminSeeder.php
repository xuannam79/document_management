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
        DB::table('department_admins')->insert([
            'name' => 'Phan Đặng Hải Vũ',
            'department_id' => 1,
            'user_id' => 1
        ]);
    }
}
