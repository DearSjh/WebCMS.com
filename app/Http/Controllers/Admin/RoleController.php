<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2019/11/5
 * Time: 16:41
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Role;
use App\Models\Admin\RoleAction;
use App\Http\Requests\Admin\Role\AddRole;
use App\Http\Requests\Admin\Role\UpdateRole;
use App\Http\Resources\Admin\Role\RoleListCollection;
use App\Http\Resources\Admin\Role\RoleValueListCollection;

class RoleController extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function lists(Request $request)
    {
        $conditions = $request->all();
        $page = $request->input('page', 0);
        $perPage = $request->input('perPage', 15);

        $list = Role::roleList($conditions, $perPage, $page);
        if (!empty($list)) {
            $this->setData(new RoleListCollection($list));
        }

        return $this->responseJSON();
    }

    public function add(Request $request)
    {
        $this->validate($request, AddRole::rules(), AddRole::msg(), AddRole::attr());
        Role::checkInfo($request->input());
        $date = Role::addRole($request->input());
        if ($date) {
            $this->setMsg(200, '操作成功');
        } else {
            $this->setMsg(400, '操作失败');
        }
        return $this->responseJSON();

    }

    public function edit(Request $request, $id)
    {
        if ($request->isMethod('post')) {
            $this->validate($request, UpdateRole::rules(), UpdateRole::msg(), UpdateRole::attr());
            Role::checkInfo($request->input(), $id);
            $date = Role::updateRole($request->input(), $id);
            if (!$date) {
                $this->setMsg(400, '操作失败');
            }
        } else {
            $result = Role::detail($id);
            $this->setData($result ?? []);
        }
        return $this->responseJSON();
    }

    public function del(Request $request)
    {
        $ret = Role::del($request->input('ids', []));
        if (!$ret) {
            $this->setMsg(500, '删除失败');
        }
        return $this->responseJSON();
    }

    public function roleValue(Request $request)
    {
        $ret = Role::roleList($request->input());
        if (!empty($ret)) {
            $this->setData(new RoleValueListCollection($ret));
        }
        return $this->responseJSON();
    }

    public function setAction(Request $request, $id)
    {
        RoleAction::checkInfo($id, $request->input('action_ids'));
        $result = RoleAction::setRoleAction($id, $request->input('action_ids'));
        if ($result) {

            $this->setMsg(200, '操作成功');
        } else {
            $this->setMsg(400, '操作失败');
        }
        return $this->responseJSON();
    }
}