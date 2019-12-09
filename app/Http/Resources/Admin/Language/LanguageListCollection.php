<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/30
 * Time: 14:23
 */

namespace App\Http\Resources\Admin\Language;


use Illuminate\Http\Resources\Json\ResourceCollection;

class LanguageListCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'data'       => LanguageResource::collection($this->collection),
        ];
    }
}