<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2019/11/5
 * Time: 16:43
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\FriendLink;
use App\Http\Resources\Admin\FriendLink\FriendLinkListCollection;
use App\Http\Requests\Admin\FriendLink\AddFriendLink;
use App\Http\Requests\Admin\FriendLink\UpdateFriendLink;
use App\Http\Requests\Admin\FriendLink\ChekFriendLink;

class FriendLinkController extends Controller
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

        $list = FriendLink::friendLinkList($conditions, $perPage, $page);

        if (!empty($list)) {
            $this->setData(new FriendLinkListCollection($list));
        }

        return $this->responseJSON();
    }

    public function add(Request $request)
    {

        $this->validate($request, AddFriendLink::rules(), AddFriendLink::msg(), AddFriendLink::attr());

        $result = FriendLink::addFriendLink($request->input());
        if ($result) {
            $this->setMsg(200, '操作成功');
        } else {
            $this->setMsg(400, '操作失败');
        }
        return $this->responseJSON();
    }

    public function edit(Request $request, $id)
    {

        if ($request->isMethod('post')) {
            $this->validate($request, UpdateFriendLink::rules(), UpdateFriendLink::msg(), UpdateFriendLink::attr());

            $date = FriendLink::updateFriendLink($request->input(), $id);
            if ($date) {
                $this->setMsg(200, '操作成功');
            } else {
                $this->setMsg(400, '操作失败');
            }
            return $this->responseJSON();
        } else {
            $result = FriendLink::detail($id);
            $this->setData($result ?? []);
        }
        return $this->responseJSON();
    }

    public function del(Request $request)
    {
        $ret = FriendLink::del($request->input('ids', []));
        if (!$ret) {
            $this->setMsg(500, '删除失败');
        }
        return $this->responseJSON();
    }

    public function open(Request $request, $id)
    {
        $this->validate($request, ChekFriendLink::rules(), ChekFriendLink::msg(), ChekFriendLink::attr());
        $result = FriendLink::open($request->input('state'), $id);
        if ($result) {

            $this->setMsg(200, '操作成功');
        } else {
            $this->setMsg(400, '操作失败');
        }
        return $this->responseJSON();
    }
}