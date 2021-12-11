<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateStuntDataHeightAgesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stunt_data_height_ages', function (Blueprint $table) {
            $table->integer('id', 11);
            $table->string('gender');
            $table->integer('month');
            $table->float('average', 11, 4);
            $table->float('standard_deviation', 11, 4);
            $table->timestamps();
        });

        DB::table('stunt_data_height_ages')->insert([
            /**
             * Gender = male
             * @param [$averageHeight, $standardDeviation, $month]
             * @return $stuntStatus
             */

            [
                'gender' => 'male',
                'month' => 0,
                'average' => 49.8842,
                'standard_deviation' => 1.8931,
            ],
            [
                'gender' => 'male',
                'month' => 1,
                'average' => 54.7244,
                'standard_deviation' => 1.9465,
            ],
            [
                'gender' => 'male',
                'month' => 2,
                'average' => 58.4249,
                'standard_deviation' => 2.0005,
            ],
            [
                'gender' => 'male',
                'month' => 3,
                'average' => 61.4292,
                'standard_deviation' => 2.0444,
            ],
            [
                'gender' => 'male',
                'month' => 4,
                'average' => 63.8860,
                'standard_deviation' => 2.0808,
            ],
            [
                'gender' => 'male',
                'month' => 5,
                'average' => 65.9026,
                'standard_deviation' => 2.1115,
            ],
            [
                'gender' => 'male',
                'month' => 6,
                'average' => 67.6236,
                'standard_deviation' => 2.1403,
            ],
            [
                'gender' => 'male',
                'month' => 7,
                'average' => 69.1645,
                'standard_deviation' => 2.1711,
            ],
            [
                'gender' => 'male',
                'month' => 8,
                'average' => 70.5994,
                'standard_deviation' => 2.2055,
            ],
            [
                'gender' => 'male',
                'month' => 9,
                'average' => 71.9687,
                'standard_deviation' => 2.2433,
            ],
            [
                'gender' => 'male',
                'month' => 10,
                'average' => 73.2812,
                'standard_deviation' => 2.2849,
            ],
            [
                'gender' => 'male',
                'month' => 11,
                'average' => 74.5388,
                'standard_deviation' => 2.3293,
            ],
            [
                'gender' => 'male',
                'month' => 12,
                'average' => 75.7488,
                'standard_deviation' => 2.3762,
            ],
            [
                'gender' => 'male',
                'month' => 13,
                'average' => 76.9186,
                'standard_deviation' => 2.4260,
            ],
            [
                'gender' => 'male',
                'month' => 14,
                'average' => 78.0497,
                'standard_deviation' => 2.4773,
            ],
            [
                'gender' => 'male',
                'month' => 15,
                'average' => 79.1458,
                'standard_deviation' => 2.5303,
            ],
            [
                'gender' => 'male',
                'month' => 16,
                'average' => 80.2113,
                'standard_deviation' => 2.5844,
            ],
            [
                'gender' => 'male',
                'month' => 17,
                'average' => 81.2487,
                'standard_deviation' => 2.6406,
            ],
            [
                'gender' => 'male',
                'month' => 18,
                'average' => 82.2587,
                'standard_deviation' => 2.6973,
            ],
            [
                'gender' => 'male',
                'month' => 19,
                'average' => 83.2418,
                'standard_deviation' => 2.7553,
            ],
            [
                'gender' => 'male',
                'month' => 20,
                'average' => 84.1996,
                'standard_deviation' => 2.8140,
            ],
            [
                'gender' => 'male',
                'month' => 21,
                'average' => 85.1348,
                'standard_deviation' => 2.8742,
            ],
            [
                'gender' => 'male',
                'month' => 22,
                'average' => 86.0477,
                'standard_deviation' => 2.9342,
            ],
            [
                'gender' => 'male',
                'month' => 23,
                'average' => 86.9410,
                'standard_deviation' => 2.9951,
            ],
            [
                'gender' => 'male',
                'month' => 24,
                'average' => 87.8161,
                'standard_deviation' => 3.0551,
            ],


            /**
             * Gender = female
             * @param [$averageHeight, $standardDeviation, $month]
             * @return $stuntStatus
             */

            [
                'gender' => 'female',
                'month' => 0,
                'average' => 49.1477,
                'standard_deviation' => 1.8627,
            ],
            [
                'gender' => 'female',
                'month' => 1,
                'average' => 53.6872,
                'standard_deviation' => 1.9542,
            ],
            [
                'gender' => 'female',
                'month' => 2,
                'average' => 57.0673,
                'standard_deviation' => 2.0362,
            ],
            [
                'gender' => 'female',
                'month' => 3,
                'average' => 59.8029,
                'standard_deviation' => 2.1051,
            ],
            [
                'gender' => 'female',
                'month' => 4,
                'average' => 62.0899,
                'standard_deviation' => 2.1645,
            ],
            [
                'gender' => 'female',
                'month' => 5,
                'average' => 64.0301,
                'standard_deviation' => 2.2174,
            ],
            [
                'gender' => 'female',
                'month' => 6,
                'average' => 65.7311,
                'standard_deviation' => 2.2664,
            ],
            // -----------------------------------------------------------------------//
            [
                'gender' => 'female',
                'month' => 7,
                'average' => 67.2873,
                'standard_deviation' => 2.3154,
            ],
            [
                'gender' => 'female',
                'month' => 8,
                'average' => 68.7498,
                'standard_deviation' => 2.3650,
            ],
            [
                'gender' => 'female',
                'month' => 9,
                'average' => 70.1435,
                'standard_deviation' => 2.4157,
            ],
            [
                'gender' => 'female',
                'month' => 10,
                'average' => 71.4818,
                'standard_deviation' => 2.4676,
            ],
            [
                'gender' => 'female',
                'month' => 11,
                'average' => 72.7710,
                'standard_deviation' => 2.5208,
            ],
            [
                'gender' => 'female',
                'month' => 12,
                'average' => 74.0150,
                'standard_deviation' => 2.5750,
            ],
            [
                'gender' => 'female',
                'month' => 13,
                'average' => 75.2176,
                'standard_deviation' => 2.6296,
            ],
            [
                'gender' => 'female',
                'month' => 14,
                'average' => 76.3817,
                'standard_deviation' => 2.6841,
            ],
            [
                'gender' => 'female',
                'month' => 15,
                'average' => 77.5099,
                'standard_deviation' => 2.7392,
            ],
            [
                'gender' => 'female',
                'month' => 16,
                'average' => 78.6055,
                'standard_deviation' => 2.7944,
            ],
            [
                'gender' => 'female',
                'month' => 17,
                'average' => 79.6710,
                'standard_deviation' => 2.8490,
            ],
            [
                'gender' => 'female',
                'month' => 18,
                'average' => 80.7079,
                'standard_deviation' => 2.9039,
            ],
            [
                'gender' => 'female',
                'month' => 19,
                'average' => 81.7182,
                'standard_deviation' => 2.9582,
            ],
            [
                'gender' => 'female',
                'month' => 20,
                'average' => 82.7036,
                'standard_deviation' => 3.0129,
            ],
            [
                'gender' => 'female',
                'month' => 21,
                'average' => 83.6654,
                'standard_deviation' => 3.0672,
            ],
            [
                'gender' => 'female',
                'month' => 22,
                'average' => 84.6040,
                'standard_deviation' => 3.1202,
            ],
            [
                'gender' => 'female',
                'month' => 23,
                'average' => 85.5202,
                'standard_deviation' => 3.1737,
            ],
            [
                'gender' => 'female',
                'month' => 24,
                'average' => 86.4153,
                'standard_deviation' => 3.2267,
            ],

        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stunt_data_height_ages');
    }
}
