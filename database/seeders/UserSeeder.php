<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'role' => 1,
            'name' => 'Fernando',
            'lastname' => 'Lopez',
            'email' => 'fer@gmail.com',
            'password' => Hash::make('password'),
            'permissions' => '{
                "dashboard":"on",
                "products.index":"on",
                "products.store":"on",
                "products.create":"on",
                "products.edit":"on",
                "products.update":"on",
                "products.destroy":"on",
                "products.gallery":"on",
                "gallery.destroy":"on",
                "categories.name.module":"on",
                "categories.create":"on",
                "categories.store":"on",
                "categories.edit":"on",
                "categories.update":"on",
                "categories.destroy":"on",
                "users.index":"on",
                "users.filter":"on",
                "users.permission":"on",
                "users.permission.post":"on",
                "users.edit":"on",
                "users.update":"on",
                "users.destroy":"on",
                "config.index": "on",
                "config.orders": "on"
            }'
        ]);
    }
}
