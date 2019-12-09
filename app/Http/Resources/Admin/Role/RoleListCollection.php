<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/30
 * Time: 14:23
 */

namespace App\Http\Resources\Admin\Role;


use Illuminate\Http\Resources\Json\ResourceCollection;

class RoleListCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'data'       => RoleResource::collection($this->collection),
            'pagination' => [
                'total'       => $this->total(),
                'count'       => $this->count(),
                'perPage'     => $this->perPage(),
                'currentPage' => $this->currentPage(),
                'totalPages'  => $this->lastPage()
            ]
        ];
    }
}