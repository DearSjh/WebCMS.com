<?php

namespace App\Http\Resources\Admin\Action;

use Illuminate\Http\Resources\Json\JsonResource;

class ActionResource extends JsonResource
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
                    'id' => $item->id,
                    'name' => $item->name,
                    'url' => $item->url,
                    'created_at' => !empty($item->created_at) ? $item->created_at->format('Y-m-d H:i:s') : '',
                ];
                if (count($item->child) > 0) {
                    foreach ($item->child as $index => $value) {
                        $date[$key]['child'][$index] = [
                            'id' => $value->id,
                            'name' => $value->name,
                            'url' => $value->url,
                            'created_at' => !empty($value->created_at) ? $value->created_at->format('Y-m-d H:i:s') : '',
                        ];

                    }
                }
            }
        }

        return [
            'id' => $this->id,
            'name' => $this->name,
            'url' => $this->url,
            'created_at' => !empty($this->created_at) ? $this->created_at->format('Y-m-d H:i:s') : '',
            'child' => $date,
        ];
    }
}
