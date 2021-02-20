<?php

namespace Database\Factories;

use App\Models\QuestionCategory;
use App\Models\Questions;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuestionsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Questions::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'qc_id'          =>      function () {
                                                 return QuestionCategory::inRandomOrder()->first()->id;
                                            },
            'q_type'         =>      1,
            'name'           =>      $this->faker->sentence($nbWords = 6),
            'tot_options'    =>      '4',
        ];
    }
}
