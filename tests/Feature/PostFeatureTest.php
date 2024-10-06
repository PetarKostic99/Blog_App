<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Post;


class PostFeatureTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    // public function test_a_user_can_create_a_post()
    // {
    //     // Arrange: Create a user
    //     $user = User::factory()->create();

    //     // Act: Simulate the user logging in and creating a post
    //     $this->actingAs($user)
    //         ->post(route('store.post'), [
    //             'title' => 'Test Post Title',
    //             'content' => 'This is a test content for the post.',
    //         ]);

    //     // Assert: Check if the post was created in the database
    //     $this->assertDatabaseHas('posts', [
    //         'title' => 'Test Post Title',
    //         'content' => 'This is a test content for the post.',
    //         'user_id' => $user->user_id,
    //     ]);
    // }
}
