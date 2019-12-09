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
use App\Models\Admin\Action;
use App\Http\Requests\Admin\Action\AddAction;
use App\Http\Requests\Admin\Action\UpdateAction;
use App\Http\Resources\Admin\Action\ActionListCollection;
use App\Http\Resources\Admin\Action\ActionValueListCollection;

class ActionController extends Controller
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

        $list = Action::actionList($conditions, $perPage, $page);
        if (!empty($list)) {
            $this->setData(new ActionListCollection($list));
        }

        return $this->responseJSON();
    }

    public function add(Request $request)
    {
        $this->validate($request, AddAction::rules(), AddAction::msg(), AddAction::attr());
        Action::checkInfo($request->input());
        $date = Action::addAction($request->input());
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
            $this->validate($request, UpdateAction::rules(), UpdateAction::msg(), UpdateAction::attr());
            Action::checkInfo($request->input(), $id);
            $date = Action::updateAction($request->input(), $id);
            if (!$date) {
                $this->setMsg(400, '操作失败');
            }
        } else {
            $result = Action::detail($id);
            $this->setData($result ?? []);
        }
        return $this->responseJSON();
    }

    public function del(Request $request)
    {
        $ret = Action::del($request->input('ids', []));
        if (!$ret) {
            $this->setMsg(500, '删除失败');
        }
        return $this->responseJSON();
    }

    public function actionValue(Request $request)
    {
        $ret = Action::actionValue($request->input());
        if (!empty($ret)) {
            $this->setData(new ActionValueListCollection($ret));
        }
        return $this->responseJSON();
    }

}