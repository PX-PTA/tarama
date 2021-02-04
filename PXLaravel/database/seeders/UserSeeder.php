<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

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
        DB::table('devices')->insert([
            'name' => "Raspiberry Pi 3"
        ]);
        DB::table('cells')->insert([
            'name' => "Cell",
            'desc' => "Sample Cell",
        ]);
        DB::table('prisoners')->insert([
            'name' => "Prisoner",
            'dob' => Carbon::now(),
            'gender' => 1,
            'address' => "Address"
        ]);
        DB::table('prisoner_cells')->insert([
            'prisoner_id' => 1,
            'cell_id' => 1,
        ]);
    }
}
