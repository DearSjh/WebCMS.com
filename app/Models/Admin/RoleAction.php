<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/17
 * Time: 14:56
 */

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RoleAction extends Model
{
    protected $table = 'role_actions';

    public function roleAction()
    {
        return $this->belongsTo(Action::class, 'action_id', 'id')->select(['id', 'name', 'url']);
    }

    public static function checkInfo($roleId, $actionIds)
    {
        $role = Role::where(['id' => $roleId])->first();
        if (empty($role)) {
            throw new \Exception('所选角色不存在');
        }
        $ids = [];

        if (empty($actionIds)) {
            throw new \Exception('请先选择权限再提交');
        }

        $action = Action::whereIn('id', $actionIds)->get('id');
        if (!empty($action)) {
            foreach ($action->toArray() as $item) {
                $ids[] = $item['id'];
            }
        }
        $result = array_diff($actionIds, $ids);

        if (!empty($result)) {
            throw new \Exception('权限id: ' . implode('，', $result) . ' 不存在');
        }

    }

    public static function setRoleAction($roleId, $actionIds)
    {
        try {
            $qb = new self();
            DB::transaction(function () use ($actionIds, $roleId) {
                if (is_array($actionIds) && !empty($actionIds)) {
                    $count = count($actionIds);
                    for ($i = 0; $i < $count; $i++) {
                        $qb = self::where(['role_id' => $roleId, 'action_id' => $actionIds[$i]])->first();
                        if (empty($qb)) {
                            $qb = new self();
                            $qb->role_id = $roleId;
                            $qb->action_id = $actionIds[$i];
                            $qb->save();
                        }
                    }
                }

            });
            return $qb;
        } catch (\Exception $e) {
            Log::error("设置权限失败,{$e->getMessage()}");
            preg_match("|entry([^^]*?)for|u", $e, $matches);
            $str = substr($matches[1], 0, strpos($matches[1], '-'));
            throw new \Exception("设置权限失败： {$str} ");
        }
    }


}