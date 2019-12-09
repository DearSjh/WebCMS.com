<?php

namespace App\Http\Resources\Admin\GoodCategory;

use Illuminate\Http\Resources\Json\JsonResource;

class GoodCategoryValueResource extends JsonResource
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
