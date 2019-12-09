<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/24
 * Time: 11:00
 */

namespace App\Http\Requests\Admin\Role;

class UpdateRole
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    static public function rules()
    {
        return [
            'name' => 'required|string|max:20',
            'desc' => 'string',
        ];
    }

    static public function msg()
    {
        return [
            'desc.string' => '角色描述类型错误',

            'name.required' => '角色名称必填',
            'name.string' => '角色名称类型错误',
            'name.max' => '角色名称不能超过20个字符',

        ];
    }

    static public function attr()
    {
        return [
            'name' => '角色名称',
            'desc' => '角色描述',
        ];
    }
}