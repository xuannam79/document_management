<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name_role' => 'Admin hệ thống'
        ]);
        DB::table('roles')->insert([
            'name_role' => 'Admin đơn vị'
        ]);
        DB::table('roles')->insert([
            'name_role' => 'Nhân viên'
        ]);
    }
}
