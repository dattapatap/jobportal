<?php

namespace Database\Factories;

use App\Models\QuestionOptions;
use App\Models\Questions;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuestionOptionsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = QuestionOptions::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'q_id'          =>        Questions::factory(),
            'options'         =>      $this->faker->sentence($nbWords = 6),
            'marks'           =>      rand(0,1),
        ];
    }
}
