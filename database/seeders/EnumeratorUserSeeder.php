<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EnumeratorUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'email' => "enumerator@riceproject.com",
            'username' => "rianLuzgel2",
            'password' => Hash::make("janedoe123"),
            'role' => "enumerator",
            'firstName' => "Luzgel",
            'lastName' => "Adriano",
            'middleName' => "Rian",
            'initdt' => now()
        ]);

        DB::table('users')->insert([
            'email' => "ssabactol18@gmail.com",
            'username' => "ssabactol18",
            'password' => Hash::make("janedoe123"),
            'role' => "enumerator",
            'firstName' => "Santy Sean",
            'lastName' => "Aguilar",
            'middleName' => "Bactol",
            'initdt' => now()
        ]);
    }
}
