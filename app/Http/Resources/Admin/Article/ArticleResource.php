<?php

namespace App\Http\Resources\Admin\Article;

use App\Http\Resources\Admin\Category\CategoryResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
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
            'category' => $this->category->name ??  $this->category_id,
            'type' => CategoryResource::getType($this->category->type ?? ''),
            'visits' => $this->visits,
            'state' => $this->state,
            'updated_at' => !empty($this->updated_at) ? $this->updated_at->format('Y-m-d H:i:s') : '',

        ];
    }
}
