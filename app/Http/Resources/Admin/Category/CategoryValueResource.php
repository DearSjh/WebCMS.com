<?php

namespace App\Http\Resources\Admin\Category;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryValueResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        $date = [];
        if (count($this->child) > 0) {
            foreach ($this->child as $key => $item) {
                $date[$key] = [
                    'label' => $item->name,
                    'value' => $item->id,
                    'parent_id' => $item->parent_id,
                ];
                if (count($item->child) > 0) {
                    foreach ($item->child as $index => $value) {
                        $date[$key]['children'][$index] = [
                            'label' => $value->name,
                            'value' => $value->id,
                            'parent_id' => $this->parent_id,
                        ];

                    }
                }
            }
        }
        return [
            'label' => $this->name,
            'value' => $this->id,
            'parent_id' => $this->parent_id,
            'children' => $date,
        ];
    }
}
