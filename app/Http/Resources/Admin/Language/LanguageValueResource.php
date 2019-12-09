<?php

namespace App\Http\Resources\Admin\Language;

use Illuminate\Http\Resources\Json\JsonResource;

class LanguageValueResource extends JsonResource
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
            'name' => $this->name,
            'value' => $this->id,
            'pic' => $this->pic,
        ];
    }
}
