<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/24
 * Time: 11:00
 */

namespace App\Http\Requests\Admin\User;

class UpdateUser
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
            'user_name' => 'required|alpha_num|max:20',
            'password' => 'alpha_num',
        ];
    }

    static public function msg()
    {
        return [

            'state.required' => '用户状态必填',
            'state.integer' => '用户状态类型有误',
            'state.in' => '用户状态类型有误',

            'password.alpha_num' => '密码只能由字母和数字组成',

            'user_name.required' => '用户名必填',
            'user_name.alpha_num' => '用户名只能由字母和数字组成',
            'user_name.max' => '用户名不能超过20个字符',

        ];
    }

    static public function attr()
    {
        return [
            'state' => '用户状态',
            'user_name' => '用户名',
            'password' => '密码',
        ];
    }
}