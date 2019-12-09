<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/30
 * Time: 14:23
 */

namespace App\Http\Resources\Admin\Category;


use Illuminate\Http\Resources\Json\ResourceCollection;

class CategoryValueListCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'data'       => CategoryValueResource::collection($this->collection),
        ];
    }
}