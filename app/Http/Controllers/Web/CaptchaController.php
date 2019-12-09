<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2019/11/27
 * Time: 17:08
 */

namespace App\Http\Controllers\Web;


use App\Http\Controllers\Controller;

class CaptchaController extends Controller
{
    public function create()
    {
        $data = app('captcha')->create();
        setcookie('captcha',$data['key']);

        $this->setData($data['img']);
        return $this->responseJSON();
    }
}