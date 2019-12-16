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

class User extends Model
{
    protected $table = 'admins';

    /**
     * @param $params
     * @throws \Exception
     */
    public function userRole()
    {
        return $this->belongsToMany(Role::class, 'user_roles', 'user_id', 'role_id', 'id')->select('id', 'name');
    }

    public static function checkInfo($params, $id = '')
    {
        if (empty($id)) {
            $result = self::where(['user_name' => $params['user_name']])->first();
        } else {
            $result = self::where('id', '!=', $id)->where(['user_name' => $params['user_name']])->first();
        }

        if (!empty($result)) {
            throw new \Exception('该用户名已添加,请勿多次添加');
        }
    }

    public static function addUser($params)
    {
        $self = new self();

        !empty($params['user_name']) && $self->user_name = $params['user_name'];
        !empty($params['password']) && $self->password = password_hash($params['password'], PASSWORD_DEFAULT);
        $self->state = $params['state'];

        return $self->save();
    }

    public static function updateUser($params, $id)
    {
        $qb = self::where(['id' => $id])->first();

        if (empty($qb)) {
            throw new \Exception('用户不存在，请先添加');
        }


        $qb->user_name = ($params['user_name'] ?? '');
        $qb->password = ($params['password'] ? password_hash($params['password'], PASSWORD_DEFAULT) : '');
        $qb->state = $params['state'];

        return $qb->update();
    }


    public static function userList($params, $parPage = PER_PAGE, $page = FIRST_PAGE)
    {
        $qb = self::with('userRole')->select(['id', 'user_name', 'state', 'created_at']);

        !empty($params['user_name']) && !empty($params['user_name']) && $qb->where('user_name', $params['user_name']);
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
        $ret = User::whereIn('id', $ids)->delete();
        if (!$ret) {
            throw new \Exception('删除失败');
        }
        return $ret;
    }

    public static function open($state, $id)
    {
        $qb = User::where(['id' => $id])->first();
        if (empty($qb)) {
            throw new \Exception('用户不存在');
        }
        $qb->state = $state;
        return $qb->update();
    }
}