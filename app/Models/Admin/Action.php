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

class Action extends Model
{

    public function child()
    {
        return $this->hasMany(Action::class, 'parent_id', 'id');
    }

    public function childDetail()
    {
        return $this->belongsTo(Action::class, 'parent_id', 'id')->select('id', 'name');
    }

    /**
     * @param $params
     * @throws \Exception
     */

    public static function checkInfo($params, $id = '')
    {
        $parent_id = $params['parent_id'] ?? 0;
        if (empty($id)) {
            $result = self::where(['name' => $params['name'], 'parent_id' => $parent_id])->first();
        } else {
            $result = self::where('id', '!=', $id)->where(['name' => $params['name'], 'parent_id' => $parent_id])->first();
        }

        if (!empty($result)) {
            throw new \Exception('该权限名称已添加,请勿多次添加');
        }
    }

    public static function addAction($params)
    {
        $self = new self();

        !empty($params['name']) && $self->name = $params['name'];
        !empty($params['parent_id']) && $self->parent_id = $params['parent_id'];
        !empty($params['url']) && $self->url = $params['url'];

        return $self->save();
    }

    public static function updateAction($params, $id)
    {
        $qb = self::where(['id' => $id])->first();

        if (empty($qb)) {
            throw new \Exception('该权限不存在，请先添加');
        }

        $qb->name = ($params['name'] ?? '');
        $qb->parent_id = ($params['parent_id'] ?? 0);
        $qb->url = ($params['url'] ?? '');

        return $qb->update();
    }

    public static function actionValue($params)
    {
        $qb = self::with('child.child.child')->select(['id', 'name', 'parent_id']);

        if (!empty($params['parent_id'])) {
            $qb->where('parent_id', $params['parent_id']);
        } else {
            $qb->where('parent_id', 0);

        }
        !empty($params['name']) && !empty($params['name']) && $qb->where('name', 'like', '%' . $params['name'] . '%');

        return $qb->get();
    }

    public static function actionList($params, $parPage = PER_PAGE, $page = FIRST_PAGE)
    {
        $qb = self::with('child.child.child')->select('*')->where('parent_id', 0);

        !empty($params['name']) && !empty($params['name']) && $qb->where('name', $params['name']);
        !empty($params['begin_time']) && $qb->where('created_at', '>=', $params['begin_time']);
        !empty($params['end_time']) && $qb->where('created_at', '<=', $params['end_time']);

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

        return self::select('*')->where(['id' => $id])->first();
    }

    public static function del($ids)
    {
        $ret = Action::whereIn('id', $ids)->delete();
        if (!$ret) {
            throw new \Exception('删除失败');
        }
        return $ret;
    }

}