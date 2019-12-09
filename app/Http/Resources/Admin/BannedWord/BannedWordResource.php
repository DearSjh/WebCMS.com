<?php

namespace App\Http\Resources\Admin\BannedWord;

use Illuminate\Http\Resources\Json\JsonResource;

class BannedWordResource extends JsonResource
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
            'word' => $this->word,
            'created_at' => !empty($this->created_at) ? $this->created_at->format('Y-m-d H:i:s') : '',

        ];
    }
}
