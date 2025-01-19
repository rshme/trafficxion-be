<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Location;
use App\Models\Parking;

class ParkingTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic unit test example.
     */
    public function test_can_find_parking_by_location_id(): void
    {
        // Create a location and related parking
        $location = Location::factory()->create();
        Parking::factory()->create(['location_id' => $location->id]);

        // Retrieve parking by location_id
        $parkings = Parking::where('location_id', $location->id)->get();

        // Assert: Check if the parking is found and matches the location_id
        $this->assertCount(1, $parkings);
        $this->assertEquals($location->id, $parkings->first()->location_id);
    }
}
