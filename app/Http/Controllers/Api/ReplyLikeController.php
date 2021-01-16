<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Reply;
use App\Models\ReplyLike;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ReplyLikeController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Models\Post $post
     * @param \App\Models\Reply $reply
     * @return \Illuminate\Http\Response
     */
    public function store(Post $post, Reply $reply)
    {
        $reply->reply_likes()->create([
            'user_id' => 1
        ]);

        return response('like it', Response::HTTP_CREATED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Post $post
     * @param \App\Models\Reply $reply
     * @param \App\Models\ReplyLike $replyLike
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post, Reply $reply, $replyLikeId)
    {
        ReplyLike::find($replyLikeId)->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
