<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/24
 * Time: 11:00
 */

namespace App\Http\Requests\Admin\User;

class ChekUser
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
        ];
    }

    static public function msg()
    {
        return [

            'state.required' => '用户状态必填',
            'state.integer' => '用户状态类型有误',
            'state.in' => '用户状态类型有误',
        ];
    }

    static public function attr()
    {
        return [
            'state' => '用户状态',
        ];
    }
}