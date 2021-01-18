<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Utils;
use Symfony\Component\HttpFoundation\Response as ReturnResponse;

class LikeController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function store(Post $post)
    {
        $post->likes()->create([
            'user_id' => 1
        ]);

        return response('like it', ReturnResponse::HTTP_CREATED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Post $post
     * @param \App\Models\Like $like
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post, Like $like)
    {
        $like->delete();

        return response('Unlike post', ReturnResponse::HTTP_NO_CONTENT);
    }
}
