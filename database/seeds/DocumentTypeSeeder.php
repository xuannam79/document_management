<?php

use Illuminate\Database\Seeder;

class DocumentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('document_types')->insert([
            'name' => 'Nghị quyết (cá biệt)'
        ]);
        DB::table('document_types')->insert([
            'name' => 'Quyết định (cá biệt)'
        ]);
        DB::table('document_types')->insert([
            'name' => 'Chỉ thị (cá biệt)'
        ]);
        DB::table('document_types')->insert([
            'name' => 'Quy chế'
        ]);
        DB::table('document_types')->insert([
            'name' => 'Quy định'
        ]);
        DB::table('document_types')->insert([
            'name' => 'Thông cáo'
        ]);
        DB::table('document_types')->insert([
            'name' => 'Thông báo'
        ]);
        DB::table('document_types')->insert([
            'name' => 'Hướng dẫn'
        ]);
        DB::table('document_types')->insert([
            'name' => 'Chương trình'
        ]);
        DB::table('document_types')->insert([
            'name' => 'Kế hoạch'
        ]);
        DB::table('document_types')->insert([
            'name' => 'Phương án'
        ]);
        DB::table('document_types')->insert([
            'name' => 'Báo cáo'
        ]);
        DB::table('document_types')->insert([
            'name' => 'Biên bản'
        ]);
        DB::table('document_types')->insert([
            'name' => 'Tờ trình'
        ]);
        DB::table('document_types')->insert([
            'name' => 'Hợp đồng'
        ]);
        DB::table('document_types')->insert([
            'name' => 'Công văn'
        ]);
        DB::table('document_types')->insert([
            'name' => 'Công điện'
        ]);
        DB::table('document_types')->insert([
            'name' => 'Bản ghi nhớ'
        ]);
        DB::table('document_types')->insert([
            'name' => 'Bản cam kết'
        ]);
        DB::table('document_types')->insert([
            'name' => 'Bản thỏa thuận'
        ]);
        DB::table('document_types')->insert([
            'name' => 'Giấy chứng nhận'
        ]);
        DB::table('document_types')->insert([
            'name' => 'Giấy ủy quyền'
        ]);
        DB::table('document_types')->insert([
            'name' => 'Giấy mời'
        ]);
        DB::table('document_types')->insert([
            'name' => 'Giấy giới thiệu'
        ]);
        DB::table('document_types')->insert([
            'name' => 'Giấy nghỉ phép'
        ]);
        DB::table('document_types')->insert([
            'name' => 'Giấy đi đường'
        ]);
        DB::table('document_types')->insert([
            'name' => 'Giấy biên nhận hồ sơ'
        ]);
        DB::table('document_types')->insert([
            'name' => 'Phiếu gửi'
        ]);
        DB::table('document_types')->insert([
            'name' => 'Phiếu chuyển'
        ]);
        DB::table('document_types')->insert([
            'name' => 'Thư công'
        ]);
    }
}
