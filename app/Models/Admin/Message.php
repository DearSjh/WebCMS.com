<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/17
 * Time: 14:56
 */

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class  Message extends Model
{

    public static function messageList($params, $parPage = PER_PAGE, $page = FIRST_PAGE)
    {

        $qb = self::select(['id','title','name','phone','email','state','address','created_at']);

        !empty($params['title']) && !empty($params['title']) && $qb->where('title', $params['title']);
        !empty($params['name']) && !empty($params['name']) && $qb->where('name', $params['name']);
        !empty($params['phone']) && !empty($params['phone']) && $qb->where('phone', $params['phone']);
        !empty($params['begin_time']) && $qb->where('created_at', '>=', $params['begin_time']);
        !empty($params['end_time']) && $qb->where('created_at', '<=', $params['end_time']);
        $qb->orderBy('id', 'desc');

        return $qb->paginate($parPage, ['*'], 'page', $page);
    }

    /**
     * Description:详情
     * Author: DJJ
     * @param $params
     * @return mixed
     */
    public static function detail($id)
    {
        $date = self::select('*')->where(['id' => $id])->first();
        $date->state = 1;
        $date->update();
        return $date;
    }

    public static function del($ids)
    {
        $ret = Message::whereIn('id', $ids)->delete();
        if (!$ret) {
            throw new \Exception('删除失败');
        }
        return $ret;
    }

    public static function open($state, $id)
    {
        $qb = Message::where(['id' => $id])->first();
        if (empty($qb)) {
            throw new \Exception('留言不存在');
        }
        $qb->state = $state;
        return $qb->update();
    }


}