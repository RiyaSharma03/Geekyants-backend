<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Riya Sharma',
            'email' => 'riya@gmail.com',
            // 'password' => Hash::make('0000'),
            'password' => 0000,
            'birthday' => "2002-12-12",
            'manager_id' => '10',
            'manager_name' => "Andriyas",
            'hr_buddy_id' => '20',
            'hr_buddy_name' => "Shruti"

        ]);
    }
}