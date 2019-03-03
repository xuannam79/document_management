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
            'name' => 'Admin hệ thống'
        ]);
        DB::table('roles')->insert([
            'name' => 'Admin đơn vị'
        ]);
        DB::table('roles')->insert([
            'name' => 'Nhân viên'
        ]);
    }
}
