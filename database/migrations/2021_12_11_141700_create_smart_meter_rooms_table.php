<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateSmartMeterRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('smart_meter_rooms', function (Blueprint $table) {
            $table->id();
            $table->string('name', 192);
            $table->timestamps();
        });

        DB::table('smart_meter_rooms')->insert([
            ['id' => 1, 'name' => 'Room 1'],
            ['id' => 2, 'name' => 'Room 2']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('smart_meter_rooms');
    }
}
