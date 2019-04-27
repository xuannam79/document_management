<?php

use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('messages')->insert([
            'sender_id' => 2,
            'receiver_id' => 1,
            'title' => 'title title',
            'content' => 'content content',
            'file_attachment' => '',
        ]);
    }
}
