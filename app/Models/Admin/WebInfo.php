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
        !empty($params['logo']) && $qb->logo = $params['logo'];
        !empty($params['url']) && $qb->url = $params['url'];
        !empty($params['seo_title']) && $qb->seo_title = $params['seo_title'];
        !empty($params['keyword']) && $qb->keyword = $params['keyword'];
        !empty($params['describe']) && $qb->describe = $params['describe'];
        !empty($params['copyright']) && $qb->copyright = $params['copyright'];
        !empty($params['hotline']) && $qb->hotline = $params['hotline'];
        !empty($params['record']) && $qb->record = $params['record'];
        !empty($params['traffic_statistics']) && $qb->traffic_statistics = $params['traffic_statistics'];
        !empty($params['online_qq']) && $qb->online_qq = $params['online_qq'];
        !empty($params['contact']) && $qb->contact = $params['contact'];
        !empty($params['email']) && $qb->email = $params['email'];
        !empty($params['phone']) && $qb->phone = $params['phone'];
        !empty($params['address']) && $qb->address = $params['address'];
        $qb->save();
        return $qb;

    }
}