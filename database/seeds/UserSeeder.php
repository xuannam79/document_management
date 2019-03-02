<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'email_user' => 'phandanghaivu@gmail.com',
            'email_verified_at' => now(),
            'password_user' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'id_role' => 1,
            'remember_token' => str_random(10)
        ]);
    }
}
