<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/25
 * Time: 13:43
 */

namespace App\Http\Requests\Admin\Auth;


class AdminAuthLogin
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    static public function rules()
    {
        return [
            'mobile' => 'regex:/^1[345678][0-9]{9}$/',
            'password' => 'required|string|min:6|max:16',
        ];
    }

    static public function msg()
    {
        return [

            'mobile.regex' => '手机号不正确',

            'password.required' => '请输入密码',
            'password.string' => '密码数据类型错误',
            'password.min' => '密码最少6个字符',
            'password.max' => '密码最多16个字符',
        ];
    }

    static public function attr()
    {
        return [
            'mobile' => '手机号',
            'password' => '密码',
        ];
    }
}