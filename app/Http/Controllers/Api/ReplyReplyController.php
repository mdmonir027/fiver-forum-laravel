<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ReplyReplyResource;
use App\Models\Post;
use App\Models\Reply;
use App\Models\ReplyReply;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as ReturnResponse;

class ReplyReplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \App\Models\Post $post
     * @param \App\Models\Reply $reply
     * @return \Illuminate\Http\Response
     */
    public function index(Post $post, Reply $reply)
    {
        return response(ReplyReplyResource::collection($reply->reply_replies), ReturnResponse::HTTP_OK);
    }


    /**
     * Store a newly created resource in storage.
     ** @param \App\Models\Post $post
     * @param \App\Models\Reply $reply
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Post $post, Reply $reply, Request $request)
    {
        $request['user_id'] = 1;
        $reply->reply_replies()->create($request->all());

        return response('created', ReturnResponse::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Post $post
     * @param \App\Models\Reply $reply
     * @param \App\Models\ReplyReply $replyReply
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post, Reply $reply, ReplyReply $replyReply)
    {
        return response(new ReplyReplyResource($replyReply), ReturnResponse::HTTP_FOUND);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \App\Models\Post $post
     * @param \App\Models\Reply $reply
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ReplyReply $replyReply
     * @return \Illuminate\Http\Response
     */
    public function update(Post $post, Reply $reply, Request $request, ReplyReply $replyReply)
    {
        $replyReply->update($request->all());
        return response('updated', ReturnResponse::HTTP_ACCEPTED);
    }

    /**
     * Remove the specified resource from storage.
     * @param \App\Models\Post $post
     * @param \App\Models\Reply $reply
     * @param \App\Models\ReplyReply $replyReply
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post, Reply $reply, ReplyReply $replyReply)
    {
        $replyReply->delete();
        return response(null, ReturnResponse::HTTP_NO_CONTENT);
    }
}
