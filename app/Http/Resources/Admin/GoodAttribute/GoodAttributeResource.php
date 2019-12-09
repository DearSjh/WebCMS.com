<?php

namespace App\Http\Resources\Admin\GoodAttribute;

use Illuminate\Http\Resources\Json\JsonResource;

class GoodAttributeResource extends JsonResource
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
            'sort' => $this->sort,
            'created_at' => !empty($this->created_at) ? $this->created_at->format('Y-m-d H:i:s') : '',
        ];
    }
}
