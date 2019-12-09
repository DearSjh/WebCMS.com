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
use App\Models\Admin\User;
use App\Models\Admin\UserRole;
use App\Http\Requests\Admin\User\AddUser;
use App\Http\Requests\Admin\User\UpdateUser;
use App\Http\Requests\Admin\User\ChekUser;
use App\Http\Resources\Admin\User\UserListCollection;

class UserController extends Controller
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

        $list = User::userList($conditions, $perPage, $page);
        if (!empty($list)) {
            $this->setData(new UserListCollection($list));
        }

        return $this->responseJSON();
    }

    public function add(Request $request)
    {
        $this->validate($request, AddUser::rules(), AddUser::msg(), AddUser::attr());
        User::checkInfo($request->input());
        $date = User::addUser($request->input());
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
            $this->validate($request, UpdateUser::rules(), UpdateUser::msg(), UpdateUser::attr());
            User::checkInfo($request->input(), $id);
            $date = User::updateUser($request->input(), $id);
            if (!$date) {
                $this->setMsg(400, '操作失败');
            }
        } else {
            $result = User::detail($id);
            $this->setData($result ?? []);
        }
        return $this->responseJSON();
    }

    public function del(Request $request)
    {
        $ret = User::del($request->input('ids', []));
        if (!$ret) {
            $this->setMsg(500, '删除失败');
        }
        return $this->responseJSON();
    }

    public function open(Request $request, $id)
    {
        $this->validate($request, ChekUser::rules(), ChekUser::msg(), ChekUser::attr());
        $result = User::open($request->input('state'), $id);
        if ($result) {

            $this->setMsg(200, '操作成功');
        } else {
            $this->setMsg(400, '操作失败');
        }
        return $this->responseJSON();
    }

    public function setRole(Request $request, $id)
    {
        UserRole::checkInfo($id, $request->input('role_id'));
        $result = UserRole::setUserRle($id, $request->input('role_id'));
        if ($result) {

            $this->setMsg(200, '操作成功');
        } else {
            $this->setMsg(400, '操作失败');
        }
        return $this->responseJSON();
    }
}