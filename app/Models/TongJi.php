<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2019/11/25
 * Time: 18:24
 */

namespace App\Models;


use App\Models\Admin\AccessLog;
use App\Models\Admin\IpView;
use App\Models\Admin\LocalView;
use App\Models\Admin\PageView;
use App\Models\Admin\TopView;
use App\Models\Admin\UserView;
use App\Service\Utils;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Input;

class TongJi extends Model
{
    public static function action($url, $referer)
    {
        $date = date('Y-m-d');
        $ip = Input::ip();
        $userIdentify = !empty($_COOKIE['uv']) ? $_COOKIE['uv'] : '';
        $local = Utils::getIpInfo($ip);


        if (Cache::has($ip) || Cache::has($userIdentify)) {
            return true;
        }
        Cache::add($ip, 1, 5);
        Cache::add($userIdentify, 1, 5);

        // 页面浏览数
        $pageView = PageView::where(['date' => $date])->first();

        if (empty($pageView->id)) {
            PageView::add(['date' => $date]);
        } else {
            $pageView->num = $pageView->num + 1;
            $pageView->update();
        }

        // 访客数
        if (!empty($userIdentify)) {

            // 独立访客数
            $userView = UserView::where(['date' => $date, 'uid' => $userIdentify])->first();
            if (empty($userView->id)) {
                UserView::add(['date' => $date, 'uid' => $userIdentify]);
            }

            // 实时访客数

            if (!empty($local['city'])) {
                $accessLog = AccessLog::where('uid', $userIdentify)->where('access_time', '<=', date('Y-m-d') . ' 23:59:59')->first();
                if (empty($accessLog->id)) {
                    AccessLog::add(['local' => $local['city'], 'url' => $url, 'ip' => $ip, 'source' => $referer, 'uid' => $userIdentify]);
                }
            }

        }

        // IP浏览数
        $ipView = IpView::where(['date' => $date, 'ip' => $ip])->first();
        if (empty($ipView->id)) {
            IpView::add(['date' => $date, 'ip' => $ip]);
        }

        // 地域统计
        if (!empty($local['region'])) {
            $localView = LocalView::where(['local' => $local['region']])->first();
            if (empty($localView->id)) {
                LocalView::add(['local' => $local['region']]);
            } else {
                $localView->num = $localView->num + 1;
                $localView->update();
            }
        }

        // 受访页面
        $topView = TopView::where(['url' => $url])->first();
        if (empty($topView)) {
            TopView::add(['url' => $url]);
        } else {
            $topView->num = $topView->num + 1;
            $topView->update();
        }

        return true;

    }
}