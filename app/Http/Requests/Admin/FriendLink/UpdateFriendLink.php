<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/24
 * Time: 11:00
 */

namespace App\Http\Requests\Admin\FriendLink;

class UpdateFriendLink
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    static public function rules()
    {
        return [

            'state' => 'required|integer|in:0,1',
            'sort' => 'integer',
        ];
    }

    static public function msg()
    {
        return [

            'state.required' => '发布状态必填',
            'state.integer' => '发布状态类型有误',
            'state.in' => '发布状态值错误',

            'sort.integer' => '排序类型有误',

        ];
    }

    static public function attr()
    {
        return [
            'state' => '发布状态',
            'sort' => '排序',
        ];
    }
}