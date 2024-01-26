<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "author_id" => User::factory(),
            "title"     => $this->faker->text(5),
            "content"   => $this->faker->text(50),
        ];
    }
}
