<?php

use Illuminate\Database\Seeder;

class DepartmentUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('department_users')->insert([
            'department_id' => 1,
            'user_id' => 1,
            'position_id' => 1,
            'start_date' => '2019/4/3',
            'end_date' => null
        ]);
    }
}
