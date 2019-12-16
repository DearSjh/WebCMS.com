<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/24
 * Time: 11:00
 */

namespace App\Http\Requests\Admin\Category;

class UpdateCategory
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    static public function rules()
    {
        return [

            'type' => 'required|integer|in:1,2',
            'state' => 'required|integer|in:0,1',
            'dir_name' => 'alpha|max:20',
        ];
    }

    static public function msg()
    {
        return [

            'type.required' => '栏目类型必填',
            'type.integer' => '栏目类型值类型错误',
            'type.in' => '栏目类型值错误',

            'dir_name.alpha' => '目录名称只能是字母',
            'dir_name.max' => '目录名称不能超过20个字符',

            'state.required' => '状态必填',
            'state.integer' => '状态类型有误',
            'state.in' => '状态值错误',
        ];
    }

    static public function attr()
    {
        return [
            'type' => '栏目类型',
            'dir_name' => '目录名称',
            'state' => '状态',
        ];
    }
}