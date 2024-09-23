<?php

namespace Database\Factories;

use App\Models\Chart;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Chart>
 */
class ChartFactory extends Factory
{
    protected $model = Chart::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph,
            'type_chart' => $this->faker->randomElement(['bar', 'line', 'pie']),
            'chart_data' => json_encode([
                'labels' => $this->faker->words(3),
                'data' => $this->faker->randomElements(range(1, 100), 3),
            ]),
        ];
    }
}
