<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateSmartBedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('smart_beds', function (Blueprint $table) {
            $table->id();
            $table->integer('age');
            $table->float('height', 11, 2);
            $table->float('weight', 11, 2);
            $table->string('parameter1')->default(0);
            $table->string('parameter2')->default(0);
            $table->timestamps();
        });

        DB::table('smart_beds')->insert([
            [
                'id' => 0,
                'age' => 0.00,
                'height' => 0.00,
                'weight' => 0.00
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
        Schema::dropIfExists('smart_beds');
    }
}
