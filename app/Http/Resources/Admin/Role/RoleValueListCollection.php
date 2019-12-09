<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/30
 * Time: 14:23
 */

namespace App\Http\Resources\Admin\Role;


use Illuminate\Http\Resources\Json\ResourceCollection;

class RoleValueListCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'data'       => RoleValueResource::collection($this->collection),
        ];
    }
}