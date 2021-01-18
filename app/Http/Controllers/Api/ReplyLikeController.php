<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Reply;
use App\Models\ReplyLike;
use Symfony\Component\HttpFoundation\Response;

class ReplyLikeController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('JWT');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Models\Post $post
     * @param \App\Models\Reply $reply
     * @return \Illuminate\Http\Response
     */
    public function store(Post $post, Reply $reply)
    {
        $reply->reply_likes()->create();

        return response('like it', Response::HTTP_CREATED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Post $post
     * @param \App\Models\Reply $reply
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post, Reply $reply)
    {
        $reply->reply_likes()->where('user_id', auth()->id())->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
