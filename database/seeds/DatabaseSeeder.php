<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(DepartmentSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(PositionSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(DepartmentAdminSeeder::class);
        $this->call(PersonSeeder::class);
        $this->call(DepartmentPersonSeeder::class);
    }
}
