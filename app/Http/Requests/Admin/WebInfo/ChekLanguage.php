<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/24
 * Time: 11:00
 */

namespace App\Http\Requests\Admin\WebInfo;

class ChekLanguage
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

            'state.required' => '语言状态必填',
            'state.integer' => '语言状态类型有误',
            'state.in' => '语言状态类型有误',
        ];
    }

    static public function attr()
    {
        return [
            'state' => '语言状态',
        ];
    }
}