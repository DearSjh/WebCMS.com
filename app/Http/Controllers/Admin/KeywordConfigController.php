<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2019/11/5
 * Time: 16:43
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\KeywordConfig;

class KeywordConfigController extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function edit(Request $request)
    {

        if ($request->isMethod('post')) {
            $date = KeywordConfig::updateConfig($request->input());
            if ($date) {
                $this->setMsg(200, '操作成功');
            } else {
                $this->setMsg(400, '操作失败');
            }

        } else {
            $config = KeywordConfig::select('*')->first();
            if (!empty($config)) {
                $this->setData($config);
            }
        }
        return $this->responseJSON();
    }
}