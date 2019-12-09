<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2019/11/25
 * Time: 18:29
 */

namespace App\Models\Admin;


use Illuminate\Database\Eloquent\Model;

class PageView extends Model
{
    public $timestamps = false;

    public static function add($data)
    {
        $pageViews = new PageView();
        $pageViews->date = $data['date'];
        $pageViews->num = $data['num'] ?? 1;

        return $pageViews->save();
    }
}