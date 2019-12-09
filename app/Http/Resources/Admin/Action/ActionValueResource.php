<?php

namespace App\Http\Resources\Admin\Action;

use Illuminate\Http\Resources\Json\JsonResource;

class ActionValueResource extends JsonResource
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
                ];
                if (count($item->child) > 0) {
                    foreach ($item->child as $index => $value) {
                        $date[$key]['children'][$index] = [
                            'label' => $value->name,
                            'value' => $value->id,
                        ];

                    }
                }
            }
        }
        return [
            'label' => $this->name,
            'value' => $this->id,
            'children' => $date,
        ];
    }
}
