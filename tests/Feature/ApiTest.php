<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Str;
use App\Models\Location;
use App\Models\News;
use App\Models\Parking;

class ApiTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test retrieving a location by slug.
     */
    public function test_find_location_by_slug()
    {
        // Arrange
        $locationName = "Central Park";
        $locationData = [
            'name' => $locationName,
            'slug' => Str::slug($locationName)
        ];
        $location = Location::create($locationData);

        // Act
        $response = $this->getJson(route('location.index', ['name' => 'Central Park']));

        // Assert
        $response->assertStatus(200);
    }

    /**
     * Test retrieving news by location ID.
     */
    public function test_find_news_by_location_id()
    {
        // Arrange
        $location = Location::factory()->create();
        $news = News::factory()->create(['location_id' => $location->id]);

        // Act
        $response = $this->getJson(route('news.index', ['location_id' => $location->id]));

        // Assert
        $response->assertStatus(200)
            ->assertJsonFragment([
                'id' => $news->id,
                'title' => $news->title,
                'content' => $news->content,
            ]);
    }

    /**
     * Test retrieving parking by location ID.
     */
    public function test_find_parking_by_location_id()
    {
        // Arrange
        $location = Location::factory()->create();
        $parking = Parking::factory()->create(['location_id' => $location->id]);

        // Act
        $response = $this->getJson(route('parking.index', ['location_id' => $location->id]));

        // Assert
        $response->assertStatus(200)
            ->assertJsonFragment([
                'id' => $parking->id,
                'name' => $parking->name,
                'type' => $parking->type,
            ]);
    }
}
