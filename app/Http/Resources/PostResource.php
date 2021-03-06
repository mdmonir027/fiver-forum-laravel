<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
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
            'title' => $this->title,
            'slug' => $this->slug,
            'content' => $this->content,
            'category' => $this->category->name,
            'user' => new UserResource($this->user),
            'likes' => $this->likes->count(),
            'liked' => !!$this->likes->where('user_id', auth()->id())->count(),
            'replies_count' => $this->replies->count(),
            'created_at' => $this->created_at->diffForHumans()
        ];
    }
}
