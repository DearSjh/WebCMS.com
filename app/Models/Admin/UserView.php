<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2019/11/25
 * Time: 18:35
 */

namespace App\Models\Admin;


use Illuminate\Database\Eloquent\Model;

class UserView extends Model
{
    public $timestamps = false;

    public static function add($data)
    {
        $userViews = new UserView();
        $userViews->date = $data['date'];
        $userViews->uid = $data['uid'];
        $userViews->num = $data['num'] ?? 1;
        return $userViews->save();
    }
}