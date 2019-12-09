<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/24
 * Time: 11:00
 */

namespace App\Http\Requests\Admin\Articles;

class UpdateArticles
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    static public function rules()
    {
        return [

            'category_id' => 'required|integer|min:1',
            'state' => 'required|integer|in:0,1',
            'top' => 'required|integer|in:0,1',
            'recommended' => 'required|integer|in:0,1',
            'rolling' => 'required|integer|in:0,1',
        ];
    }

    static public function msg()
    {
        return [

            'category_id.required' => '所属栏目必填',
            'category_id.integer' => '所属栏目类型错误',
            'category_id.min' => '所属栏目值错误',

            'state.required' => '发布状态必填',
            'state.integer' => '发布状态类型有误',
            'state.in' => '发布状态值错误',

            'top.required' => '置顶状态必填',
            'top.integer' => '置顶状态类型有误',
            'top.in' => '置顶状态值错误',

            'recommended.required' => '推荐状态必填',
            'recommended.integer' => '推荐状态类型有误',
            'recommended.in' => '推荐状态值错误',

            'rolling.required' => '滚动状态必填',
            'rolling.integer' => '滚动状态类型有误',
            'rolling.in' => '滚动状态值错误',
        ];
    }

    static public function attr()
    {
        return [
            'category_id' => '所属栏目',
            'state' => '发布状态',
            'top' => '置顶状态',
            'recommended' => '推荐状态',
            'rolling' => '滚动状态',
        ];
    }
}