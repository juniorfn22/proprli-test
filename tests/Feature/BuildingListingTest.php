<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Building;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BuildingListingTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_list_buildings(): void
    {
        Building::factory()->count(5)->create();

        $response = $this->getJson('/api/buildings');

        $response->assertStatus(200);

        $response->assertJsonCount(5, 'data');
    }
}
