<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/24
 * Time: 11:00
 */

namespace App\Http\Requests\Admin\BannedWord;

class AddBannedWord
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    static public function rules()
    {
        return [

            'word' => 'required',
        ];
    }

    static public function msg()
    {
        return [
            'word.required' => '违禁词必填',
        ];
    }

    static public function attr()
    {
        return [
            'word' => '违禁词',
        ];
    }
}