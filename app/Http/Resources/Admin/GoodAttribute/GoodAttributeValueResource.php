<?php

namespace App\Http\Resources\Admin\GoodAttribute;

use Illuminate\Http\Resources\Json\JsonResource;

class GoodAttributeValueResource extends JsonResource
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
            'value' => $this->name,
            'address' => $this->id,
        ];
    }
}
