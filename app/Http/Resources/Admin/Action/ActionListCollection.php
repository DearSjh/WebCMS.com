<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/30
 * Time: 14:23
 */

namespace App\Http\Resources\Admin\Action;


use Illuminate\Http\Resources\Json\ResourceCollection;

class ActionListCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'data'       => ActionResource::collection($this->collection),
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