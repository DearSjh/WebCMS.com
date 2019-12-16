<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/24
 * Time: 11:00
 */

namespace App\Http\Requests\Admin\Banner;

class UpdateBanner
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    static public function rules()
    {
        return [

            'sort' => 'integer|min:1',
            'state' => 'required|integer|in:0,1',
            'title' => 'required|string',
            'picture' => 'string',
        ];
    }

    static public function msg()
    {
        return [
            'sort.integer' => '排序类型有误',
            'sort.min' => '排序值最小为1',

            'title.required' => '标题必填',
            'title.string' => '标题类型有误',

            'picture.string' => '图片地址类型有误',

            'state.required' => '状态必填',
            'state.integer' => '状态类型有误',
            'state.in' => '状态值错误',
        ];
    }

    static public function attr()
    {
        return [
            'sort' => '排序',
            'state' => '状态',
            'title' => '标题',
            'picture' => '图片地址',
        ];
    }
}