<?php

namespace Database\Factories;

use App\Models\Location;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News>
 */
class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'location_id' => $this->faker->randomElement(Location::pluck('id')->toArray()),
            'title' => $this->faker->sentence(5),
            'content' => $this->faker->paragraph(3),
            'published_at' => $this->faker->dateTimeThisYear(),
            'cover_url' => $this->faker->imageUrl(),
            'images' => $this->generateImageJsonArray(),
        ];
    }

    private function generateImageJsonArray(?string $category = null, int $width = 640, int $height = 480): string
    {
        // Randomize the number of images between minCount and maxCount
        $count = rand(3, 5);
        $images = [];

        // Generate the image URLs
        for ($i = 0; $i < $count; $i++) {
            $images[] = $this->faker->imageUrl($width, $height, $category);
        }

        // Return the JSON-encoded array of image URLs
        return json_encode($images);
    }
}
