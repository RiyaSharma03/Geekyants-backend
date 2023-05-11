<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Riya Sharma',
                'email' => 'riyas@geekyants.com',
                'password' => 'riya',
                'allocated_seat'=>"New Building, 2nd Floor - B4",
                'birthday'=>"2001-06-03",
                'manager_id'=>2,
                'manager_name'=>"Raghavendra H J",
                'hr_buddy_id'=>3,
                'hr_buddy_name'=>"Shruti Mohandas"
            ]
            // add more custom data here
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
