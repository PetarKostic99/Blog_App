<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\Post;

class PostTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }

    public function test_post_length_is_calculated_correctly()
    {
        // Create a new Post instance
        $post = new Post();
        $post->content = 'This is a sample post.';

        // Assert that the post length is 22 (excluding the period)
        $this->assertEquals(22, $post->getPostLength());
    }
}
