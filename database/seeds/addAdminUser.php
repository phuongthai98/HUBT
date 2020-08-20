<?php

use Illuminate\Database\Seeder;

class addAdminUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::query()->insert([
            'name' => 'npthai',
            'full_name' => 'Nguyễn Phương Thái',
            'email' => 'phuongthai98@gmail.com',
            'password' => bcrypt('123456'),
            'address' => 'Thành phố Hà Nội',
            'phone' => '0971874749',
            'avatar' => NULL,
            'status' => 1
        ]);
    }
}
