<?php

namespace Database\Factories;

use App\Models\Quiz;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Question>
 */
class QuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'quiz_id' => 1,
            'question_image' => 'https://via.placeholder.com/600x400',
            'question' => $this->faker->sentence,
            'options' => json_encode([
                'a' => $this->faker->sentence,
                'b' => $this->faker->sentence,
                'c' => $this->faker->sentence,
                'd' => $this->faker->sentence,
                'e' => $this->faker->sentence,
            ]),
            'correct_answer' => $this->faker->randomElement(['a', 'b', 'c', 'd', 'e']),
        ];
    }
}
