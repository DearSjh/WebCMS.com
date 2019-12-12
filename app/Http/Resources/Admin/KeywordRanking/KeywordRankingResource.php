<?php

namespace App\Http\Resources\Admin\KeywordRanking;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Admin\GoodAttribute;

class KeywordRankingResource extends JsonResource
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
            'keyword' => $this->keyword,
            'latest_ranking' => $this->latest_ranking,
            'deduction' => $this->deduction,
            'created_at' => !empty($this->created_at) ? $this->created_at->format('Y-m-d H:i:s') : '',
        ];
    }
}
