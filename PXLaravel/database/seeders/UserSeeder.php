<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => "Super Admin",
            'level' => 1
        ]);
        DB::table('roles')->insert([
            'name' => "Admin",
            'level' => 2
        ]);
        DB::table('roles')->insert([
            'name' => "User",
            'level' => 3
        ]);
        DB::table('users')->insert([
            'name' => "Super Admin",
            'email' => "SuperAdmin@admin.com",
            'password' => Hash::make('admin'),
            'role_id' => 1
        ]);
    }
}
