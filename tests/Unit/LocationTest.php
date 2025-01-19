<?php

namespace Tests\Unit;

use App\Models\Location;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Str;

class LocationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic unit test example.
     */
    public function test_can_create_location(): void
    {
        $locationName = "Dayeuh Kolot";
        $locationData = [
            'name' => $locationName,
            'slug' => Str::slug($locationName)
        ];

        $location = Location::create($locationData);


        $this->assertInstanceOf(Location::class, $location);
        $this->assertEquals($location->name, $locationData['name']);
    }

    public function test_can_find_location_by_slug() : void
    {
        //Create a sample location
        Location::factory()->create(['name' => 'Central Park', 'slug' => 'central-park']);

        // Retrieve the location by slug
        $found = Location::where('slug', 'central-park')->first();

        // Assert: Check if the location is found and matches the slug
        $this->assertNotNull($found);
        $this->assertEquals('central-park', $found->slug);
    }
}
