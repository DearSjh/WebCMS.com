<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/24
 * Time: 11:00
 */

namespace App\Http\Requests\Admin\Articles;

class ListArticles
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    static public function rules()
    {
        return [

            'category_id' => 'required|integer',
        ];
    }

    static public function msg()
    {
        return [
            'category_id.required' => '栏目ID必填',
            'category_id.integer' => '栏目ID类型有误',
        ];
    }

    static public function attr()
    {
        return [
            'category_id' => '栏目ID',
        ];
    }
}