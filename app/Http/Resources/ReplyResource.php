<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReplyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'body' => $this->body,
            'user' => new UserResource($this->user),
            'replies_count' => $this->reply_replies->count(),
            'likes' => $this->reply_likes->count(),
            'liked' => !!$this->reply_likes->where('user_id', auth()->id())->count(),
            'created_at' => $this->created_at->diffForHumans(),
        ];
    }
}
