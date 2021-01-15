<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Reply;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReplyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Reply::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'body' => $this->faker->text,
            'user_id' => function () {
                return User::all()->random();
            },
            'post_id' => function () {
                return Post::all()->random();
            },
        ];
    }
}
