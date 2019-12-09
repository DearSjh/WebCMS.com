<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/30
 * Time: 14:23
 */

namespace App\Http\Resources\Admin\Action;


use Illuminate\Http\Resources\Json\ResourceCollection;

class ActionValueListCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'data'       => ActionValueResource::collection($this->collection),
        ];
    }
}