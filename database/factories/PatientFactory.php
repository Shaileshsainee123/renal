<?php

namespace Database\Factories;

use App\Models\Patient;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class PatientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Patient::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'age' => rand(5, 25),
            'mobile' => '98675'.rand(10000, 99999),
            'created_at' => $this->faker->dateTimeThisMonth(Carbon::now()->addDays(30), 'Asia/Kolkata'),
        ];
    }
}
