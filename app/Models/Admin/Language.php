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

class Language extends Model
{
    public $timestamps = false;


    public static function languageList()
    {
        return  self::select('*')->get();
    }

    public static function open($state, $id)
    {
        $qb = Language::where(['id' => $id])->first();
        if (empty($qb)) {
            throw new \Exception('所选语言不存在');
        }
        $qb->state = $state;
        return $qb->update();
    }

    public static function languageValue()
    {
        $qb = self::select('*')->where('state',1);

        return $qb->get();
    }
}
