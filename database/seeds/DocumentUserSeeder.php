<?php

use Illuminate\Database\Seeder;

class DocumentUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('document_user')->insert([
            'document_id' => 1,
            'array_user_seen' => '',
            'is_seen' => 1,
        ]);
    }
}
