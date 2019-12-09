<?php

namespace App\Http\Resources\Admin\Good;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Admin\GoodAttribute;

class GoodResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        $attribute = $this->attribute;
        $date = GoodAttribute::select(['id', 'name'])->whereIn('id', explode(',', $this->attribute))->get();
        if (!empty($date->toArray())) {
            $attribute = '';
            foreach ($date->toArray() as $value) {
                $attribute .= $value['name'] . ',';
            }
            $attribute = substr($attribute,0,strlen($attribute)-1);
        }

        return [
            'id' => $this->id,
            'name' => $this->name,
            'category_name' => $this->category->name ?? $this->category_id,
            'good_class' => $this->goodCategory->name ?? $this->goodclass_id,
            'attribute' =>$attribute,
            'market_price' => $this->market_price,
            'sale_price' => $this->sale_price,
            'inventory' => $this->inventory,
            'state' => $this->state,
            'created_at' => !empty($this->created_at) ? $this->created_at->format('Y-m-d H:i:s') : '',

        ];
    }
}
