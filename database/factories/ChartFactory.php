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
            'category' => json_encode($this->faker->words(3)),
            'series' => json_encode([
                [
                    'name' => $this->faker->word,
                    'data' => $this->faker->randomElements(range(1, 100), 3),
                ],
                [
                    'name' => $this->faker->word,
                    'data' => $this->faker->randomElements(range(1, 100), 3),
                ]
            ]),
        ];
    }
}
