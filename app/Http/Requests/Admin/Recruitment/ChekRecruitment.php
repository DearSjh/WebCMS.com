<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/24
 * Time: 11:00
 */

namespace App\Http\Requests\Admin\Recruitment;

class ChekRecruitment
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
            'state.required' => '状态必填',
            'state.integer' => '状态类型有误',
            'state.in' => '状态值错误',
        ];
    }

    static public function attr()
    {
        return [
            'state' => '状态',
        ];
    }
}