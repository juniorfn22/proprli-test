<?php

namespace Tests\Feature;

use App\Models\Building;
use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TaskListingTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_lists_tasks_of_a_building(): void
    {
        $building = Building::factory()->create();

        $user = User::factory()->create();

        $task1 = Task::factory()->create([
            'building_id' => $building->id,
            'user_id' => $user->id,
            'status' => 'Open',
        ]);

        $task2 = Task::factory()->create([
            'building_id' => $building->id,
            'user_id' => $user->id,
            'status' => 'In Progress',
        ]);

        $response = $this->getJson("/api/tasks?building_id=$building->id");

        $response->assertStatus(200);

        $response->assertJsonFragment([
            'id' => $task1->id,
            'building_id' => $building->id,
            'user_id' => $user->id,
            'status' => 'Open',
        ]);

        $response->assertJsonFragment([
            'id' => $task2->id,
            'building_id' => $building->id,
            'user_id' => $user->id,
            'status' => 'In Progress',
        ]);
    }
}
