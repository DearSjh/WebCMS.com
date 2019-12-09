<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2019/11/25
 * Time: 18:48
 */

namespace App\Models\Admin;


use Illuminate\Database\Eloquent\Model;

class LocalView extends Model
{
    public $timestamps = false;

    public static function add($data)
    {
        $localViews = new LocalView();
        $localViews->local = $data['local'];
        $localViews->num = $data['num'] ?? 1;
        return $localViews->save();

    }
}