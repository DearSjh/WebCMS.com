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
use App\Models\Admin\Banner;
use App\Http\Requests\Admin\Banner\AddBanner;
use App\Http\Requests\Admin\Banner\UpdateBanner;
use App\Http\Requests\Admin\Banner\ChekBanner;
use App\Http\Resources\Admin\Banner\BannerListCollection;

class BannerController extends Controller
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

        $result = Banner::bannerList($conditions, $perPage, $page);

        if (!empty($result)) {
            $this->setData(new BannerListCollection($result));
        }

        return $this->responseJSON();
    }

    public function add(Request $request)
    {
        $this->validate($request, AddBanner::rules(), AddBanner::msg(), AddBanner::attr());
        $result = Banner::addBanner($request->input());
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
            $this->validate($request, UpdateBanner::rules(), UpdateBanner::msg(), UpdateBanner::attr());
            $date = Banner::updateBanner($request->input(), $id);
            if ($date) {
                $this->setMsg(200, '操作成功');
            } else {
                $this->setMsg(400, '操作失败');
            }
            return $this->responseJSON();
        } else {
            $result = Banner::detail($id);
            $this->setData($result ?? []);
        }
        return $this->responseJSON();
    }

    public function del(Request $request)
    {
        $ret = Banner::del($request->input('ids', []));
        if (!$ret) {
            $this->setMsg(500, '删除失败');
        }
        return $this->responseJSON();
    }

    public function open(Request $request, $id)
    {
        $this->validate($request, ChekBanner::rules(), ChekBanner::msg(), ChekBanner::attr());
        $result = Banner::open($request->input('state'), $id);
        if ($result) {

            $this->setMsg(200, '操作成功');
        } else {
            $this->setMsg(400, '操作失败');
        }
        return $this->responseJSON();
    }

}