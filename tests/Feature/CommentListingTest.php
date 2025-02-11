<?php


use App\Models\Building;
use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CommentListingTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_lists_all_comments(): void
    {
        $response = $this->getJson("/api/comments");

        $response->assertStatus(200);

    }
}
