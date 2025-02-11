<?php

namespace Tests\Feature;

use App\Models\Building;
use App\Models\Comment;
use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BuildingListingWithTasksAndCommentsTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test */
    public function it_can_list_buildings_with_tasks_and_comments(): void
    {
        Building::factory()
            ->has(
                Task::factory()
                    ->for(User::factory())
                    ->has(
                        Comment::factory()
                            ->for(User::factory())
                            ->count(3)
                    )
                    ->count(5)
            )
            ->count(5)
            ->create();


        $response = $this->getJson('/api/buildings');

        $response->assertStatus(200);

        $response->assertJsonCount(5, 'data');
    }
}
