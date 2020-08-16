<?php

use Illuminate\Database\Seeder;

class add_permission extends Seeder
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
                'name' => 'admin',
                'group_permission' => 'admin',
                'guard_name' => 'web'
            ], [
                'name' => 'role-list',
                'group_permission' => 'role',
                'guard_name' => 'web'
            ], [
                'name' => 'role-create',
                'group_permission' => 'role',
                'guard_name' => 'web'
            ], [
                'name' => 'role-edit',
                'group_permission' => 'role',
                'guard_name' => 'web'
            ], [
                'name' => 'role-delete',
                'group_permission' => 'role',
                'guard_name' => 'web'
            ], [
                'name' => 'product-list',
                'group_permission' => 'product',
                'guard_name' => 'web'
            ], [
                'name' => 'product-create',
                'group_permission' => 'product',
                'guard_name' => 'web'
            ], [
                'name' => 'product-edit',
                'group_permission' => 'product',
                'guard_name' => 'web'
            ], [
                'name' => 'product-delete',
                'group_permission' => 'product',
                'guard_name' => 'web'
            ]
        ];
        \Illuminate\Support\Facades\DB::table('permissions')->insert($data);
    }
}
