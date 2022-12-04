<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'email' => "admin@riceproject.com",
            'username' => "admin",
            'password' => Hash::make("janedoe123"),
            'role' => "admin",
            'firstName' => "Luzgel",
            'lastName' => "Adriano",
            'middleName' => "Rian",
            'initdt' => now()
        ]);
    }
}
