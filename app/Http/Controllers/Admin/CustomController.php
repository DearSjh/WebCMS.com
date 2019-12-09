<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2019/11/5
 * Time: 16:42
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Custom;
use App\Http\Requests\Admin\Custom\ChekCustom;
use App\Http\Requests\Admin\Custom\AddCustom;
use App\Http\Requests\Admin\Custom\UpdateCustom;
use App\Http\Resources\Admin\Custom\CustomListCollection;

class CustomController extends Controller
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

        $list = Custom::customList($conditions, $perPage, $page);

        if (!empty($list)) {
            $this->setData(new CustomListCollection($list));
        }

        return $this->responseJSON();
    }

    public function add(Request $request)
    {
        $this->validate($request, AddCustom::rules(), AddCustom::msg(), AddCustom::attr());
        Custom::checkInfo($request->input());
        $result = Custom::addCustom($request->input());
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
            $this->validate($request, UpdateCustom::rules(), UpdateCustom::msg(), UpdateCustom::attr());
            Custom::checkUpdateInfo($request->input(), $id);
            $date = Custom::updateCustom($request->input(), $id);
            if ($date) {
                $this->setMsg(200, '操作成功');
            } else {
                $this->setMsg(400, '操作失败');
            }
            return $this->responseJSON();
        } else {
            $result = Custom::detail($id);
            $this->setData($result ?? []);
        }
        return $this->responseJSON();
    }

    public function del(Request $request)
    {
        $ret = Custom::del($request->input('ids', []));
        if (!$ret) {
            $this->setMsg(500, '删除失败');
        }
        return $this->responseJSON();
    }

    public function open(Request $request, $id)
    {
        $this->validate($request, ChekCustom::rules(), ChekCustom::msg(), ChekCustom::attr());

        $result = Custom::open($request->input('state'), $id);
        if ($result) {

            $this->setMsg(200, '操作成功');
        } else {
            $this->setMsg(400, '操作失败');
        }
        return $this->responseJSON();
    }
}