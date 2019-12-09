<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/24
 * Time: 11:00
 */

namespace App\Http\Requests\Admin\Recruitment;

class UpdateRecruitment
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    static public function rules()
    {
        return [

            'gender' => 'required|integer|in:0,1,2',
            'state' => 'required|integer|in:0,1',
            'sort' => 'integer',
        ];
    }

    static public function msg()
    {
        return [

            'gender.required' => '性别要求必填',
            'gender.integer' => '性别要求类型有误',
            'gender.in' => '性别要求值错误',

            'state.required' => '发布状态必填',
            'state.integer' => '发布状态类型有误',
            'state.in' => '发布状态值错误',

            'sort.integer' => '排序类型有误',
            'number.integer' => '招聘人数类型有误',

        ];
    }

    static public function attr()
    {
        return [
            'gender' => '性别要求',
            'state' => '发布状态',
            'sort' => '排序',
            'number' => '招聘人数',
        ];
    }
}