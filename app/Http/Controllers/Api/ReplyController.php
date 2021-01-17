<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ReplyResource;
use App\Models\Post;
use App\Models\Reply;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as ReturnResponse;

class ReplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function index(Post $post)
    {
        return response(ReplyResource::collection($post->replies), ReturnResponse::HTTP_OK);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Models\Post $post
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Post $post, Request $request)
    {
       $reply = $post->replies()->create($request->all());

        return response(new ReplyResource($reply), ReturnResponse::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Post $post
     * @param \App\Models\Reply $reply
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post, Reply $reply)
    {
        return response(new ReplyResource($reply), ReturnResponse::HTTP_FOUND);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \App\Models\Post $post
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Reply $reply
     * @return \Illuminate\Http\Response
     */
    public function update(Post $post, Request $request, Reply $reply)
    {
        $reply->update($request->all());
        return response('updated', ReturnResponse::HTTP_ACCEPTED);
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
        $reply->delete();
        return response(null, ReturnResponse::HTTP_NO_CONTENT);

    }
}
