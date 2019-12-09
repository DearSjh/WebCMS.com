<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2019/11/26
 * Time: 9:32
 */

namespace App\Models\Admin;


use Illuminate\Database\Eloquent\Model;

class TopView extends Model
{
    public $timestamps = false;

    public static function add($data)
    {
        $topViews = new TopView();
        $topViews->url = $data['url'];
        $topViews->num = $data['num'] ?? 1;
        return $topViews->save();

    }
}