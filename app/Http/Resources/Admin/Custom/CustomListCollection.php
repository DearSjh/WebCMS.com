<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/30
 * Time: 14:23
 */

namespace App\Http\Resources\Admin\Custom;


use Illuminate\Http\Resources\Json\ResourceCollection;

class CustomListCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'data'       => CustomResource::collection($this->collection),
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