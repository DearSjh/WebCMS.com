<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2019/11/5
 * Time: 16:44
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Recruitment;
use App\Http\Resources\Admin\Recruitment\RecruitmentListCollection;
use App\Http\Requests\Admin\Recruitment\AddRecruitment;
use App\Http\Requests\Admin\Recruitment\UpdateRecruitment;
use App\Http\Requests\Admin\Recruitment\ChekRecruitment;

class RecruitmentController extends Controller
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

        $list = Recruitment::recruitmentList($conditions, $perPage, $page);
        if (!empty($list)) {
            $this->setData(new RecruitmentListCollection($list));
        }

        return $this->responseJSON();
    }

    public function add(Request $request)
    {

        $this->validate($request, AddRecruitment::rules(), AddRecruitment::msg(), AddRecruitment::attr());

        $result = Recruitment::addRecruitment($request->input(), $_FILES);
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
            $this->validate($request, UpdateRecruitment::rules(), UpdateRecruitment::msg(), UpdateRecruitment::attr());

            $date = Recruitment::updateRecruitment($request->input(), $id);
            if ($date) {
                $this->setMsg(200, '操作成功');
            } else {
                $this->setMsg(400, '操作失败');
            }
            return $this->responseJSON();
        } else {
            $result = Recruitment::detail($id);
            $this->setData($result ?? []);
        }
        return $this->responseJSON();
    }

    public function del(Request $request)
    {
        $ret = Recruitment::del($request->input('ids', []));
        if (!$ret) {
            $this->setMsg(500, '删除失败');
        }
        return $this->responseJSON();
    }

    public function open(Request $request, $id)
    {
        $this->validate($request, ChekRecruitment::rules(), ChekRecruitment::msg(), ChekRecruitment::attr());
        $result = Recruitment::open($request->input('state'), $id);
        if ($result) {

            $this->setMsg(200, '操作成功');
        } else {
            $this->setMsg(400, '操作失败');
        }
        return $this->responseJSON();
    }
}