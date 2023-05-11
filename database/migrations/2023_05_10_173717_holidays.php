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
        DB::table('upcoming_holidays')->insert([
                [
                  'name'=>'Buddha Purnima',
                  'date'=>"2023-05-05 ",
                  'is_optional'=> 1,
                ],
                [
                  'name'=>'Eid-al-Adha',
                  'date'=> "2023-06-29",
                  'is_optional'=> 1,
                ],
                [
                  'name'=>'Independence Day',
                  'date'=> "2023-08-15",
                  'is_optional'=> 0,
                ],
                [
                  'name'=>'Parsi New Year',
                  'date'=> "2023-08-16",
                  'is_optional'=> 1,
                ],
                [
                  'name'=>'Onam',
                  'date'=> "2023-08-29",
                  'is_optional'=> 1,
                ],
                [
                  'name'=>'Janamashtami',
                  'date'=> "2023-09-07",
                  'is_optional'=> 1,
                ],
                [
                  'name'=>'Ganesh Chaturthi',
                  'date'=> "2023-09-19",
                  'is_optional'=> 1,
                ],
                [
                  'name'=>'Eid E Milad',
                  'date'=> "2023-09-28",
                  'is_optional'=> 1,
                ],
                [
                  'name'=>'Gandhi Jayanti',
                  'date'=> "2023-10-02",
                  'is_optional'=> 0,
                ],
                [
                  'name'=>'Dussehra',
                  'date'=> "2023-10-24",
                  'is_optional'=> 0,
                ],
                [
                  'name'=>'Karnataka Rajyotsava',
                  'date'=> "2023-11-01",
                  'is_optional'=> 0,
                ],
                [
                  'name'=>'Diwali (Bali Pratipada)',
                  'date'=> "2023-11-14",
                  'is_optional'=> 1,
                ],
                [
                  'name'=>'Thanksgiving',
                  'date'=> "2023-11-23",
                  'is_optional'=> 1,
                ],
                [
                  'name'=>'Guru Nanak Jayanti',
                  'date'=> "2023-11-27",
                  'is_optional'=> 1,
                ],
                [
                  'name'=>'Kanakadasa Jayanti',
                  'date'=> "2023-11-30",
                  'is_optional'=> 1,
                ],
                [
                  'name'=>'Christmas',
                  'date'=> "2023-12-25",
                  'is_optional'=> 0,
                ],
              
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
