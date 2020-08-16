<?php

use Illuminate\Database\Seeder;

class addCategory extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'category_name' => 'Hãng Acer',
                'group_category' => 1,
                'status' => 1,
                'created_at' => '2020-04-16 14:28:04',
            ],[
                'category_name' => 'Hãng HP',
                'group_category' => 1,
                'status' => 1,
                'created_at' => '2020-04-16 14:28:04',
            ],[
                'category_name' => 'Hãng Dell',
                'group_category' => 1,
                'status' => 1,
                'created_at' => '2020-04-16 14:28:04',
            ],[
                'category_name' => 'Hãng Asus',
                'group_category' => 1,
                'status' => 1,
                'created_at' => '2020-04-16 14:28:04',
            ],[
                'category_name' => 'Hãng HP',
                'group_category' => 1,
                'status' => 1,
                'created_at' => '2020-04-16 14:28:04',
            ],[
                'category_name' => 'Hãng Apple',
                'group_category' => 1,
                'status' => 1,
                'created_at' => '2020-04-16 14:28:04',
            ],[
                'category_name' => 'Hãng Lenovo',
                'group_category' => 1,
                'status' => 1,
                'created_at' => '2020-04-16 14:28:04',
            ],[
                'category_name' => 'Tai Nghe',
                'group_category' => 2,
                'status' => 1,
                'created_at' => '2020-04-16 14:28:04',
            ],[
                'category_name' => 'Chuột Không Dây',
                'group_category' => 2,
                'status' => 1,
                'created_at' => '2020-04-16 14:28:04',
            ],[
                'category_name' => 'Phụ Kiện Làm Mát',
                'group_category' => 2,
                'status' => 1,
                'created_at' => '2020-04-16 14:28:04',
            ],[
                'category_name' => 'Bàn Phím Laptop',
                'group_category' => 2,
                'status' => 1,
                'created_at' => '2020-04-16 14:28:04',
            ],[
                'category_name' => 'Laptop Cũ',
                'group_category' => 2,
                'status' => 1,
                'created_at' => '2020-04-16 14:28:04',
            ],[
                'category_name' => 'Phụ Kiện Gía rẻ',
                'group_category' => 2,
                'status' => 1,
                'created_at' => '2020-04-16 14:28:04',
            ]
        ];

        \Illuminate\Support\Facades\DB::table('category')->insert($data);
    }
}
