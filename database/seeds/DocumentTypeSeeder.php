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
            'name' => 'Nghị quyết (cá biệt)',
            'is_active' => 1,
        ]);
        DB::table('document_types')->insert([
            'name' => 'Quyết định (cá biệt)',
            'is_active' => 1,
        ]);
        DB::table('document_types')->insert([
            'name' => 'Chỉ thị (cá biệt)',
            'is_active' => 1,
        ]);
        DB::table('document_types')->insert([
            'name' => 'Quy chế',
            'is_active' => 1,
        ]);
        DB::table('document_types')->insert([
            'name' => 'Quy định',
            'is_active' => 1,
        ]);
        DB::table('document_types')->insert([
            'name' => 'Thông cáo',
            'is_active' => 1,
        ]);
        DB::table('document_types')->insert([
            'name' => 'Thông báo',
            'is_active' => 1,
        ]);
        DB::table('document_types')->insert([
            'name' => 'Hướng dẫn',
            'is_active' => 1,
        ]);
        DB::table('document_types')->insert([
            'name' => 'Chương trình',
            'is_active' => 1,
        ]);
        DB::table('document_types')->insert([
            'name' => 'Kế hoạch',
            'is_active' => 1,
        ]);
        DB::table('document_types')->insert([
            'name' => 'Phương án',
            'is_active' => 1,
        ]);
        DB::table('document_types')->insert([
            'name' => 'Báo cáo',
            'is_active' => 1,
        ]);
        DB::table('document_types')->insert([
            'name' => 'Biên bản',
            'is_active' => 1,
        ]);
        DB::table('document_types')->insert([
            'name' => 'Tờ trình',
            'is_active' => 1,
        ]);
        DB::table('document_types')->insert([
            'name' => 'Hợp đồng',
            'is_active' => 1,
        ]);
        DB::table('document_types')->insert([
            'name' => 'Công văn',
            'is_active' => 1,
        ]);
        DB::table('document_types')->insert([
            'name' => 'Công điện',
            'is_active' => 1,
        ]);
        DB::table('document_types')->insert([
            'name' => 'Bản ghi nhớ',
            'is_active' => 1,
        ]);
        DB::table('document_types')->insert([
            'name' => 'Bản cam kết',
            'is_active' => 1,
        ]);
        DB::table('document_types')->insert([
            'name' => 'Bản thỏa thuận',
            'is_active' => 1,
        ]);
        DB::table('document_types')->insert([
            'name' => 'Giấy chứng nhận',
            'is_active' => 1,
        ]);
        DB::table('document_types')->insert([
            'name' => 'Giấy ủy quyền',
            'is_active' => 1,
        ]);
        DB::table('document_types')->insert([
            'name' => 'Giấy mời',
            'is_active' => 1,
        ]);
        DB::table('document_types')->insert([
            'name' => 'Giấy giới thiệu',
            'is_active' => 0,
        ]);
        DB::table('document_types')->insert([
            'name' => 'Giấy nghỉ phép',
            'is_active' => 0,
        ]);
        DB::table('document_types')->insert([
            'name' => 'Giấy đi đường',
            'is_active' => 0,
        ]);
        DB::table('document_types')->insert([
            'name' => 'Giấy biên nhận hồ sơ',
            'is_active' => 0,
        ]);
        DB::table('document_types')->insert([
            'name' => 'Phiếu gửi',
            'is_active' => 0,
        ]);
        DB::table('document_types')->insert([
            'name' => 'Phiếu chuyển',
            'is_active' => 0,
        ]);
        DB::table('document_types')->insert([
            'name' => 'Thư công',
            'is_active' => 0,
        ]);
    }
}
