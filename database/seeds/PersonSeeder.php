<?php

use Illuminate\Database\Seeder;

class PersonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('persons')->insert([
            'name' => 'Vu Phan',
            'birth_date' => '1997/03/28',
            'gender' => 'Nam',
            'address' => '08 Ha Van Tinh, Da Nang',
            'user_id' => '1',
            'phone' => '0354525110',
        ]);
    }
}
