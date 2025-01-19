<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Location;
use App\Models\News;

class NewsTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_find_news_by_location_id()
    {
        // Arrange: Create a location and related news
        $location = Location::factory()->create();
        News::factory()->create(['location_id' => $location->id]);

        // Act: Retrieve news by location_id
        $news = News::where('location_id', $location->id)->get();

        // Assert: Check if the news is found and matches the location_id
        $this->assertCount(1, $news);
        $this->assertEquals($location->id, $news->first()->location_id);
    }
}
