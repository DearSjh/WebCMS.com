<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2019/11/5
 * Time: 16:58
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\WebInfo;
use App\Models\Admin\Language;
use App\Models\Admin\Email;
use App\Http\Requests\Admin\WebInfo\ChekLanguage;
use App\Http\Requests\Admin\WebInfo\UpdateWebInfo;
use App\Http\Resources\Admin\Language\LanguageListCollection;
use App\Http\Resources\Admin\Language\LanguageValueListCollection;
use Illuminate\Support\Facades\Cache;

class WebInfoController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }


    public function basic(Request $request)
    {
        if ($request->isMethod('get')) {
            $webInfo = WebInfo::select('*')->first();
            if (!empty($webInfo)) {
                $this->setData($webInfo);
            }

            return $this->responseJSON();
        } else {
            $this->validate($request, UpdateWebInfo::rules(), UpdateWebInfo::msg(), UpdateWebInfo::attr());
            $date = WebInfo::updateWebInfo($request->input());
            if ($date) {
                $this->setMsg(200, '操作成功');

                if ($request->input('web_cache')) {
                    Cache::forever('open_web_cache', true);
                } else {
                    Cache::forever('open_web_cache', false);
                }

            } else {
                $this->setMsg(400, '操作失败');
            }
            return $this->responseJSON();

        }
    }

    public function email(Request $request)
    {
        if ($request->isMethod('get')) {

            $email = Email::select('*')->first();
            if (!empty($email)) {
                $this->setData($email);
            }

            return $this->responseJSON();
        } else {
            $date = Email::updateWebInfo($request->input());
            if ($date) {
                $this->setMsg(200, '操作成功');
            } else {
                $this->setMsg(400, '操作失败');
            }
            return $this->responseJSON();

        }
    }

    public function languageList()
    {
        $list = Language::languageList();
        if (!empty($list)) {
            $this->setData(new LanguageListCollection($list));
        }

        return $this->responseJSON();
    }

    public function openLanguage(Request $request, $id)
    {
        $this->validate($request, ChekLanguage::rules(), ChekLanguage::msg(), ChekLanguage::attr());
        $result = Language::open($request->input('state'), $id);
        if ($result) {

            $this->setMsg(200, '操作成功');
        } else {
            $this->setMsg(400, '操作失败');
        }
        return $this->responseJSON();
    }

    public function languageValue()
    {
        $ret = Language::languageValue();
        if (!empty($ret)) {
            $this->setData(new LanguageValueListCollection($ret));
        }
        return $this->responseJSON();
    }
}