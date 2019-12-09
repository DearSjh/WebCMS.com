<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/24
 * Time: 11:00
 */

namespace App\Http\Requests\Admin\Auth;



class Register
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    static public function rules()
    {
        return [
            'mobile'      => 'regex:/^1[345678][0-9]{9}$/',
            'password'    => 'required|string|min:6|max:16',
//            'linkman'     => 'required|string|max:10',
            'mobile_code' => 'integer|min:100000|max:999999',
            'payload'     => 'string|max:10000',
        ];
    }

    static public function msg()
    {
        return [

            'mobile.regex' => '手机号不正确',

            'password.required' => '请输入密码',
            'password.string'   => '密码数据类型错误',
            'password.min'      => '密码最少6个字符',
            'password.max'      => '密码最多16个字符',

            'linkman.required' => '请输入联系人',
            'linkman.string'   => '联系人数据类型错误',
            'linkman.max'      => '联系人最多10个字符',

            'mobile_code.required' => '请输入手机验证码',
            'mobile_code.integer'  => '手机验证码数据类型错误',
            'mobile_code.min'      => '手机验证码不正确',
            'mobile_code.max'      => '手机验证码不正确',

            'payload.string' => 'payload数据类型错误',
            'payload.max'    => 'payload最多10个字符',


        ];
    }

    static public function attr()
    {
        return [
            'mobile'   => '手机号',
            'password' => '密码',
        ];
    }
}