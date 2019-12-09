<?php

namespace App\Http\Resources\Admin\Recruitment;

use Illuminate\Http\Resources\Json\JsonResource;

class RecruitmentResource extends JsonResource
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
            'place' => $this->place,
            'nature' => $this->nature,
            'number' => $this->number,
            'effective' => $this->effective,
            'state' => $this->state,
            'created_at' => !empty($this->created_at) ? $this->created_at->format('Y-m-d H:i:s') : '',

        ];
    }
}
