<?php

namespace Database\Factories;

use App\Models\Question;
use App\Models\Quiz;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Quiz>
 */
class QuizFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'is_public' => $this->faker->boolean,
            'code' => $this->faker->lexify('??????'),
            'title' => $this->faker->sentence(2),
            'description' => $this->faker->paragraph,
            'cover_image' => 'https://via.placeholder.com/600x400',
            'time_limit' => $this->faker->numberBetween(10, 30),
            'creator_id' => User::factory()->create()->id,
        ];
    }

    public function configure(): static
    {
        return $this->afterCreating(function (Quiz $quiz) {
            Question::factory()->count(5)->create([
                'quiz_id' => $quiz->id,
            ]);
        });
    }
    
}
