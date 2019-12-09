<?php

namespace App\Http\Resources\Admin\Message;

use Illuminate\Http\Resources\Json\JsonResource;

class MessageResource extends JsonResource
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
            'title' => $this->title,
            'name' => $this->name,
            'phone' => $this->phone,
            'email' => $this->email,
            'address' => $this->address,
            'state' => $this->state ? '已查看' : '未查看',
            'created_at' => !empty($this->created_at) ? $this->created_at->format('Y-m-d H:i:s') : '',

        ];
    }
}
