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
        Schema::table('projects', function (Blueprint $table) {
           
            $table->string('pm')->nullable()->change();
         });
        DB::table('projects')->insert([
            [
                'title' => 'CoinUp',
                'date'=>"2021-12-02",
                'pm'=>null,
                'user_id'=>1
            ],
            [
                'title' => 'Academy Portal',
                'date'=>"2022-05-02",
                'pm'=>"Raghavendra HJ",
                'user_id'=>1
            ],
            [
                'title' => 'CoinUp - CoinUp_Staff Augmentation',
                'date'=>"2022-09-02",
                'pm'=>null,
                'user_id'=>1
            ],
            [
                'title' => 'Hiring Drive',
                'date'=>"2018-05-01",
                'pm'=>"Sarwar Imam",
                'user_id'=>1
            ]
            // add more custom data here
        ]);
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
