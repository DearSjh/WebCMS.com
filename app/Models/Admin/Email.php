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

class Email extends Model
{
    /**
     * Description: 更新邮箱信息
     * Author: DJJ
     * @param $params
     * @return mixed
     */
    public static function updateWebInfo($params)
    {
        $qb = Email::select('*')->first();

        if (empty($qb)) {
            $qb = new self();
        }
        $qb->title = ($params['title'] ?? '');
        $qb->smtp_server = ($params['smtp_server'] ?? '');
        $qb->smtp_port = ($params['smtp_port'] ?? '');
        $qb->account = ($params['account'] ?? '');
        $qb->code = ($params['code'] ?? '');
        $qb->to_email = ($params['to_email'] ?? '');
        $qb->save();
        return $qb;

    }
}