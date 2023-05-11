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
        DB::table('bonuses')->insert([
            [
                'status' => 1,
                'title' => 'Jio EPSP - JIO -EPSP RM APP',
                'date'=>"2023-02-07",
                'duration'=>3,
                'type'=>"Extra working hours bonus",
                'user_id'=>1
            ],
            [
                'status' => 1,
                'title' => 'Jio EPSP - JIO -EPSP RM APP',
                'date'=>"2023-02-07",
                'duration'=>3,
                'type'=>"Extra working hours bonus",
                'user_id'=>1
            ],
            [
                'status' => 1,
                'title' => 'Jio EPSP - JIO -EPSP RM APP',
                'date'=>"2023-02-13",
                'duration'=>3,
                'type'=>"Extra working hours bonus",
                'user_id'=>1
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
