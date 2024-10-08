<?php

namespace Database\Factories;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'comment' => $this->faker->text(200),
            'post_id' => Post::factory(), // povezivanje komentara sa postom
            'user_id' => User::inRandomOrder()->first()->user_id, // Uzmi nasumično postojećeg korisnika
            'approved' => $this->faker->boolean(),
        ];

    }
}
