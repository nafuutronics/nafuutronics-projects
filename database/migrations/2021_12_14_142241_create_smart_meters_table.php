<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSmartMetersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('smart_meters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('smart_meter_room_id')->constrained('smart_meter_rooms')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('energy')->default(0);
            $table->float('voltage', 11, 2);
            $table->float('current', 11, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('smart_meters');
    }
}
