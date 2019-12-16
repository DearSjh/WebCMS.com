<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Input;
use Laravel\Lumen\Routing\Controller as BaseController;

include_once base_path('app/helpers.php');

class Controller extends BaseController
{
    //

    private $code = 200;
    private $message = '操作成功';
    private $data = [];
    public $env = '';

    public function __construct()
    {
        $this->env = env('APP_ENV');

    }

    public function setMsg($code = 200, $message = '')
    {
        $this->code = $code;
        $this->message = $message;
    }

    public function setData($data = [])
    {
        $this->data = $data;
    }


    public function responseJSON($code = 200)
    {
        $arrayResult['code'] = $this->code ?? 200;
        $arrayResult['message'] = $this->message;
        $arrayResult['data'] = $this->data;

        return response()->json($arrayResult, $code)->setEncodingOptions(JSON_UNESCAPED_UNICODE);
    }

    public function errorLog($message, \Exception $exception)
    {
        \Log::error("{$message},{$exception->getMessage()},{$exception->getFile()},{$exception->getLine()}");
    }

    /**
     * @param $view
     * @return \Illuminate\View\View|mixed|string
     * @throws \Throwable
     */
    public function view($view)
    {

        $key = Input::path();

        if (Cache::get('open_web_cache') == true) {
            $rep = Cache::get($key);
            if (empty($rep)) {
                $rep = view('web.' . $view)->__toString();
                Cache::forever($key, $rep);
            }
            return $rep;
        } else {
            return view('web.' . $view);
        }

    }
}
