<?php

use Illuminate\Database\Seeder;

class add_role extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\Models\User::create([
            'name' => 'Phuong Thai',
            'full_name' => 'Nguyen Phuong Thai',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456'),
            'address' => 'Ha Noi',
            'phone' => '0971874749',
            'status' => 1
        ]);

        $role = \Spatie\Permission\Models\Role::create(['name' => 'Admin']);

        $permissions = \Spatie\Permission\Models\Permission::pluck('id','id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);
    }
}
