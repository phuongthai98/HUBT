<?php

use Illuminate\Database\Seeder;

class add_test_banner extends Seeder
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
                'banner_name' => 'banner 1',
                'image' => '1.jpg',
                'link' => 'fb.com/npthaii',
                'status' => 1
            ],[
                'banner_name' => 'banner 2',
                'image' => '2.jpg',
                'link' => 'fb.com/npthaii',
                'status' => 1
            ],[
                'banner_name' => 'banner 3',
                'image' => '3.jpg',
                'link' => 'fb.com/npthaii',
                'status' => 1
            ],[
                'banner_name' => 'banner 4',
                'image' => '4.jpg',
                'link' => 'fb.com/npthaii',
                'status' => 1
            ],[
                'banner_name' => 'banner 5',
                'image' => '5.jpg',
                'link' => 'fb.com/npthaii',
                'status' => 1
            ],[
                'banner_name' => 'banner 6',
                'image' => '6.jpg',
                'link' => 'fb.com/npthaii',
                'status' => 1
            ]
        ];

        \Illuminate\Support\Facades\DB::table('banner')->insert($data);
    }
}
