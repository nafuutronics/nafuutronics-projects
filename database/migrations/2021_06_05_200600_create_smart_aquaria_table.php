<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateSmartAquariaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('smart_aquaria', function (Blueprint $table) {
            $table->id();
            $table->float('temperature', 11, 2);
            $table->float('depth', 11, 2);
            $table->float('ph', 11, 2);
            $table->float('food_cycle', 11, 2);
            $table->timestamps();
        });

        DB::table('smart_aquaria')->insert([
            [
                'id' => 1,
                'temperature' => 0,
                'depth' => 0,
                'ph' => 0,
                'food_cycle' => 0,
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('smart_aquaria');
    }
}
