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
        DB::table('support_tickets')->insert([
            [
                'title' => 'Request For Monitor',
                'status'=>1,
                'user_id'=>1
            ],
            [
                'title' => 'Request For Keyboard and Mouse',
                'status'=>1,
                'user_id'=>1
            ],
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
