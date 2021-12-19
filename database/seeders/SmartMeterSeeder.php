<?php

namespace Database\Seeders;

use App\Models\SmartMeter;
use Database\Factories\SmartMeterFactory;
use Illuminate\Database\Seeder;

class SmartMeterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SmartMeter::factory(30)->create();
    }
}
