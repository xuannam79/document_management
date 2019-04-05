<?php

use Illuminate\Database\Seeder;

class DocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('documents')->insert([
            'document_number' => 'NQ001',
            'document_type_id' => 1,
            'content' => "Nghị quyết về việc koon ăn gà quá nhiều bị gà nhập và mua bi tít dẫn đến đói nhăn răng cuối tháng",
            'publish_date' => "2019-06-16",
            'department_id' => 1,
            'user_id' => 1,
        ]);
    }
}
