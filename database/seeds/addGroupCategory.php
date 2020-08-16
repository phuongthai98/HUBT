<?php

use Illuminate\Database\Seeder;

class addGroupCategory extends Seeder
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
                'category_group_name' => 'Hãng Laptop',
                'status' => '1'
            ],[
                'category_group_name' => 'Phụ kiện',
                'status' => '1'
            ]
        ];
        \Illuminate\Support\Facades\DB::table('category_group')->insert($data);
    }
}
