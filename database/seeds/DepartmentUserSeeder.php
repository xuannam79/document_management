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
            'user_id' => 2,
            'position_id' => 1,
            'start_date' => '2019/05/10',
            'end_date' => null
        ]);
        DB::table('department_users')->insert([
            'department_id' => 2,
            'user_id' => 3,
            'position_id' => 1,
            'start_date' => '2019/05/10',
            'end_date' => null
        ]);
        DB::table('department_users')->insert([
            'department_id' => 2,
            'user_id' => 4,
            'position_id' => 2,
            'start_date' => '2019/05/10',
            'end_date' => null
        ]);
    }
}
