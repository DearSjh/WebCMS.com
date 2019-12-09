<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/30
 * Time: 14:23
 */

namespace App\Http\Resources\Admin\GoodAttribute;


use Illuminate\Http\Resources\Json\ResourceCollection;

class GoodAttributeValueListCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'data'       => GoodAttributeValueResource::collection($this->collection),
        ];
    }
}