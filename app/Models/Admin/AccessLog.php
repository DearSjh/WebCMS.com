<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2019/11/26
 * Time: 10:04
 */

namespace App\Models\Admin;


use Illuminate\Database\Eloquent\Model;

class AccessLog extends Model
{
    public $timestamps = false;

    public static function add($data)
    {
        $accessLog = new AccessLog();
        $accessLog->access_time = date('Y-m-d H:i:s');
        $accessLog->local = $data['local'];
        $accessLog->url = $data['url'];
        $accessLog->ip = $data['ip'];
        $accessLog->source = $data['source'];
        $accessLog->uid = $data['uid'];
        return $accessLog->save();

    }
}