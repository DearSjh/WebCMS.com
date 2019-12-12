<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2019/11/19
 * Time: 13:39
 */

namespace App\Http\Controllers\Web;


use App\Http\Controllers\Controller;
use App\Service\Utils;

class CacheController extends Controller
{
    /**
     * @return \Illuminate\View\View|mixed|string
     * @throws \Throwable
     */
    public function del()
    {

        Utils::delDir('../storage/framework/views/');

        return $this->responseJSON();
    }
}