<?php

namespace Tests\Feature;

use App\Models\Building;
use App\Models\User;
use Tests\TestCase;

class TaskCreationTest extends TestCase
{
    /** @test */
    public function it_can_create_a_task_of_a_building(): void
    {
        $building = Building::factory()->create();
        $user = User::factory()->create();

        $taskData = [
            'building_id' => $building->id,
            'user_id' => $user->id,
            'title' => 'New Task Title',
            'description' => 'Description of the task.',
            'status' => 'Open',
        ];

        $response = $this->postJson('/api/tasks', $taskData);

        $response->assertStatus(201);

        $response->assertJsonFragment([
            'building_id' => $building->id,
            'user_id' => $user->id,
            'title' => 'New Task Title',
            'description' => 'Description of the task.',
            'status' => 'Open',
        ]);

        $this->assertDatabaseHas('tasks', $taskData);
    }
}
