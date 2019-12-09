<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2019/11/11
 * Time: 18:18
 */

namespace App\Http\Controllers\Web;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class ContactUsController extends Controller
{
    /**
     * @return mixed|string
     * @throws \Throwable
     */
    public function index()
    {
        return $this->view('contactUs');
    }
}