<?php

namespace App\Http\Resources\Admin\Category;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
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
                    'type' => self::getType($item->type),
                    'name' => $item->name,
                    'dir_name' => $item->dir_name ?? '',
                    'link' => $item->link,
                    'sort' => $item->sort,
                    'state' => $item->state,
                    'created_at' => !empty($item->created_at) ? $item->created_at->format('Y-m-d H:i:s') : '',
                ];
                if (count($item->child) > 0) {
                    foreach ($item->child as $index => $value) {
                        $date[$key]['child'][$index] = [
                            'id' => $value->id,
                            'type' => self::getType($value->type),
                            'name' => $value->name,
                            'dir_name' => $value->dir_name ?? '',
                            'link' => $value->link,
                            'sort' => $value->sort,
                            'state' => $value->state,
                            'created_at' => !empty($value->created_at) ? $value->created_at->format('Y-m-d H:i:s') : '',
                        ];

                    }
                }
            }
        }
        return [
            'id' => $this->id,
            'type' => self::getType($this->type),
            'name' => $this->name,
            'dir_name' => $this->dir_name ?? '',
            'link' => $this->link,
            'sort' => $this->sort,
            'state' => $this->state,
            'created_at' => !empty($this->created_at) ? $this->created_at->format('Y-m-d H:i:s') : '',
            'child' => $date,
        ];
    }

    public static function getType($value)
    {
        if ($value == 1) {
            $type = '单页';
        } elseif ($value == 2) {
            $type = '列表';
        } elseif ($value == 3) {
            $type = '商品';
        } else {
            $type = $value;
        }
        return $type;
    }
}
