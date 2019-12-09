<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/24
 * Time: 11:00
 */

namespace App\Http\Requests\Admin\Action;

class UpdateAction
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
            'parent_id' => 'integer',
        ];
    }

    static public function msg()
    {
        return [
            'parent_id.integer' => '父级ID只能为数字',

            'name.required' => '权限名称必填',
            'name.string' => '权限名称类型错误',
            'name.max' => '权限名称不能超过20个字符',

        ];
    }

    static public function attr()
    {
        return [
            'name' => '权限名称',
            'parent_id' => '父级ID',
        ];
    }
}