<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Location;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Parking>
 */
class ParkingFactory extends Factory
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
            'type' => $this->faker->randomElement(['car', 'motorcycle']),  // Enum field (car or motorcycle)
            'name' => $this->faker->company,  // Random vehicle name (e.g., "Toyota", "Yamaha")
            'cover_url' => $this->faker->imageUrl(640, 480, 'transport', true),  // Random image URL (optional: nullable)
            'images' => $this->generateImageJsonArray(),
            'booked_count' => $this->faker->numberBetween(1, 100),  // Random booked count between 0 and 100
            'total_space' => $this->faker->numberBetween(50, 100),  // Random space between 1 and 10
            'maps_url' => $this->faker->url,  // Random maps URL (could be Google Maps, OpenStreetMap, etc.)
            'open_time' => $this->faker->time('H:i:s'),  // Random opening time (e.g., 09:00:00)
            'close_time' => $this->faker->time('H:i:s'),  // Random closing time (e.g., 17:00:00)
            'is_24hour' => $this->faker->boolean,  // Random boolean (true or false)
            'price_per_hour' => $this->faker->numberBetween(3000, 10000),  // Random price per hour (between 10 and 100)
            'public_transport_nearby' => $this->generatePublicTransport(),
        ];
    }

    /**
     * Generate random nearby public transport data.
     *
     * @return array
     */
    private function generatePublicTransport()
    {
        // Define possible transport names
        $transports = ['TransJakarta', 'KAI', 'MRT'];

        // Create a random number of transport options (1 to 3)
        $numberOfTransports = rand(1, 3);

        $publicTransportData = [];

        for ($i = 0; $i < $numberOfTransports; $i++) {
            $publicTransportData[] = [
                'name' => $this->faker->randomElement($transports),  // Random transport name (e.g., bus, train)
                'time_seconds' => $this->faker->numberBetween(180, 420),  // Random time (30 seconds to 30 minutes)
            ];
        }

        return json_encode($publicTransportData);  // Return the array of transport data
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
