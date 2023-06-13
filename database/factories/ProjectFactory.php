<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        static $image_index = 1;
        $image_path = "images/{$image_index}.png";

        $image_index++;

        return [
            'title' => __($this->faker->sentence),
            'description' => __($this->faker->paragraph(50 , true)),
            'image_path' => __($image_path),
        ];
    }
}
