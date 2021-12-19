<?php

namespace Database\Factories;

use App\Models\SmartMeter;
use Illuminate\Database\Eloquent\Factories\Factory;

class SmartMeterFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SmartMeter::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'smart_meter_room_id' => rand(1, 2) > 1 ? 2 : 1,
            'voltage' => rand(220, 240),
            'current' => rand(0, 8),
            'energy' => rand(1, 100)
        ];
    }
}
