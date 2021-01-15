<?php

namespace Database\Factories;

use App\Models\Reply;
use App\Models\ReplyReply;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReplyReplyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ReplyReply::class;

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
            'reply_id' => function () {
                return Reply::all()->random();
            },
        ];
    }
}
