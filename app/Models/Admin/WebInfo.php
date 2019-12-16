<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/17
 * Time: 14:56
 */

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Service\Utils;

class WebInfo extends Model
{
    /**
     * Description: 更新网站信息
     * Author: DJJ
     * @param $params
     * @return mixed
     */
    public static function updateWebInfo($params)
    {
        $qb = WebInfo::select('*')->first();
        if (empty($qb)) {
            $qb = new self();
        }
        $qb->logo = ($params['logo'] ?? '');
        $qb->url = ($params['url'] ?? '');
        $qb->seo_title = ($params['seo_title'] ?? '');
        $qb->keyword = ($params['keyword'] ?? '');
        $qb->describe = ($params['describe'] ?? '');
        $qb->copyright = ($params['copyright'] ?? '');
        $qb->hotline = ($params['hotline'] ?? '');
        $qb->record = ($params['record'] ?? '');
        $qb->traffic_statistics = ($params['traffic_statistics'] ?? '');
        $qb->online_qq = ($params['online_qq'] ?? '');
        $qb->contact = ($params['contact'] ?? '');
        $qb->email = ($params['email'] ?? '');
        $qb->phone = ($params['phone'] ?? '');
        $qb->address = ($params['address'] ?? '');
        $qb->web_cache = $params['web_cache'];

        $qb->save();
        return $qb;

    }
}