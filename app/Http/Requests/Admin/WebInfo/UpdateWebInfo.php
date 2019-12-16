<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/24
 * Time: 11:00
 */

namespace App\Http\Requests\Admin\WebInfo;

class UpdateWebInfo
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    static public function rules()
    {
        return [
            'web_cache' => 'required|integer|in:0,1',
        ];
    }

    static public function msg()
    {
        return [

            'web_cache.required' => '是否开启缓存必填',
            'web_cache.integer' => '是否开启缓存类型有误',
            'web_cache.in' => '是否开启缓存类型有误',

        ];
    }

    static public function attr()
    {
        return [
            'web_cache' => '是否开启缓存',
        ];
    }
}