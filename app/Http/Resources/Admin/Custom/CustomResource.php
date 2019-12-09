<?php

namespace App\Http\Resources\Admin\Custom;

use Illuminate\Http\Resources\Json\JsonResource;

class CustomResource extends JsonResource
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
            'updated_at' => !empty($this->updated_at) ? $this->updated_at->format('Y-m-d H:i:s') : '',

        ];
    }
}
