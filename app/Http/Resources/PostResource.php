<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
                'title'=>$this->title,
                'description'=>$this->description,
                // 'posted_by' =>$this->user ? $this->user->name : 'not found',
                'user' => new UserResource($this->user)
            ];
    }
}
