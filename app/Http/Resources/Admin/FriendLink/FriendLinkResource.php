<?php

namespace App\Http\Resources\Admin\FriendLink;

use Illuminate\Http\Resources\Json\JsonResource;

class FriendLinkResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'picture' => $this->picture,
            'link' => $this->link,
            'state' => $this->state,
            'created_at' => !empty($this->created_at) ? $this->created_at->format('Y-m-d H:i:s') : '',
        ];
    }
}
