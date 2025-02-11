<?php

namespace Tests\Feature;

use App\Models\Building;
use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CommentCreationTest extends TestCase
{
    /** @test*/
    public function it_can_create_a_task_of_a_building(): void
    {
        $task = Task::factory()->create();
        $user = User::factory()->create();

        $commentData = [
            'task_id' => $task->id,
            'user_id' => $user->id,
            'content' => 'New coment content',
        ];

        $response = $this->postJson('/api/comments', $commentData);

        $response->assertStatus(201);

        $response->assertJsonFragment([
            'task_id' => $task->id,
            'user_id' => $user->id,
            'content' => 'New coment content',
        ]);

        $this->assertDatabaseHas('comments', $commentData);
    }
}
