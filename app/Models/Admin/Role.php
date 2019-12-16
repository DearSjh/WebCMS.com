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

class Role extends Model
{

    /**
     * @param $params
     * @throws \Exception
     */

    public function roleAction()
    {
        return $this->hasMany(RoleAction::class, 'role_id', 'id')->select(['role_id', 'action_id']);
    }

    public function actionRole()
    {
        return $this->belongsToMany(Action::class, 'role_actions', 'role_id', 'action_id')->select('name', 'url', 'icon','parent_id');
    }

    public static function checkInfo($params, $id = '')
    {
        if (empty($id)) {
            $result = self::where(['name' => $params['name']])->first();
        } else {
            $result = self::where('id', '!=', $id)->where(['name' => $params['name']])->first();
        }

        if (!empty($result)) {
            throw new \Exception('该角色已添加,请勿多次添加');
        }
    }

    public static function addRole($params)
    {
        $self = new self();

        !empty($params['name']) && $self->name = $params['name'];
        !empty($params['desc']) && $self->desc = $params['desc'];

        return $self->save();
    }

    public static function updateRole($params, $id)
    {
        $qb = self::where(['id' => $id])->first();

        if (empty($qb)) {
            throw new \Exception('该角色不存在，请先添加');
        }

        $qb->name = ($params['name'] ?? '');
        $qb->desc = ($params['desc'] ?? '');
        return $qb->update();
    }


    public static function roleList($params, $parPage = PER_PAGE, $page = FIRST_PAGE)
    {
        $qb = self::with('roleAction')->select(['id', 'name', 'desc', 'created_at']);

        !empty($params['name']) && !empty($params['name']) && $qb->where('name', $params['name']);
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

        return self::select('*')->where(['id' => $id])->first();
    }

    public static function del($ids)
    {
        $ret = Role::whereIn('id', $ids)->delete();
        if (!$ret) {
            throw new \Exception('删除失败');
        }
        return $ret;
    }

}