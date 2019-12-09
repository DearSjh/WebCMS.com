<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/17
 * Time: 14:56
 */

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    protected $table = 'user_roles';

    public function userRole()
    {
        return $this->belongsTo(Role::class, 'role_id', 'id')->select(['id', 'name']);
    }

    public static function checkInfo($userId, $roleId)
    {
        $qb = User::where(['id' => $userId])->first();
        if (empty($qb)) {
            throw new \Exception('用户不存在');
        }
        $role = Role::where(['id' => $roleId])->first();
        if (empty($role)) {
            throw new \Exception('所选角色不存在');
        }
    }

    public static function setUserRle($userId, $roleId)
    {
        $qb = self::where(['user_id' => $userId])->first();

        if (empty($qb)) {
            $qb = new self();
        }
        $qb->user_id = $userId;
        $qb->role_id = $roleId;
        return $qb->save();
    }

    public static function getRoleAction($userId)
    {
        $date = [
            'role_name' => '未设置角色',
            'child' => [],
        ];
        $userRole = UserRole::with('userRole')->where('user_id', $userId)->first('role_id');

        if (empty($userRole->userRole)) {
            return $date;
        }
        $date['role_name'] = $userRole->userRole->name ?? '';

        $roleAction = Role::with('actionRole')->where('id', $userRole->userRole->id)->get('id');
        if (empty($roleAction)) {
            return $date;
        }

        $roleAction = $roleAction->toArray();
        if (count($roleAction['0']['action_role']) == 0) {
            return $date;
        }

        $key = 0;
        $i = 0;
        $child = [];
        foreach ($roleAction['0']['action_role'] as $action) {
            if ($action['parent_id'] == 0) {
                $child[$key++] = [
                    'name' => $action['name'],
                    'id' => $action['pivot']['action_id'],
                    'url' => $action['url'],
                    'icon' => $action['icon'],
                ];
            }
        }

        foreach ($child as $key => $item) {
            foreach ($roleAction['0']['action_role'] as $value) {
                if ($value['parent_id'] == $item['id']) {
                    $child[$key]['child'][$i++] = [
                        'name' => $value['name'],
                        'icon' => $value['icon'],
                        'url' => $value['url'],
                    ];
                }
            }
        }
        $date['child'] = $child;

        return $date;
    }

}