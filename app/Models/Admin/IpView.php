<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2019/11/25
 * Time: 18:44
 */

namespace App\Models\Admin;


use Illuminate\Database\Eloquent\Model;

class IpView extends Model
{
    public $timestamps = false;

    public static function add($data)
    {
        $ipViews = new IpView();
        $ipViews->date = $data['date'];
        $ipViews->ip = $data['ip'];
        $ipViews->num = $data['num'] ?? 1;
        return $ipViews->save();
    }
}