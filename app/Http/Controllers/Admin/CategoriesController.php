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
use App\Models\Admin\Category;
use App\Http\Requests\Admin\Category\AddCategory;
use App\Http\Requests\Admin\Category\UpdateCategory;
use App\Http\Requests\Admin\Category\ChekCategory;
use App\Http\Resources\Admin\Category\CategoryValueListCollection;
use App\Http\Resources\Admin\Category\CategoryListCollection;

class CategoriesController extends Controller
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

        $list = Category::CategoriesList($conditions, $perPage, $page);

        if (!empty($list)) {
            $this->setData(new CategoryListCollection($list));
        }

        return $this->responseJSON();
    }

    public function add(Request $request)
    {
        $this->validate($request, AddCategory::rules(), AddCategory::msg(), AddCategory::attr());
        Category::checkInfo($request->input());
        $date = Category::addCategories($request->input());
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
            $this->validate($request, UpdateCategory::rules(), UpdateCategory::msg(), UpdateCategory::attr());
            Category::checkInfo($request->input(), $id);
            $date = Category::updateCategory($request->input(), $id);
            if (!$date) {
                $this->setMsg(400, '操作失败');
            }
        } else {
            $result = Category::detail($id);
            $this->setData($result ?? []);
        }
        return $this->responseJSON();
    }

    public function del(Request $request)
    {
        $ret = Category::del($request->input('ids', []));
        if (!$ret) {
            $this->setMsg(500, '删除失败');
        }
        return $this->responseJSON();
    }

    public function open(Request $request, $id)
    {
        $this->validate($request, ChekCategory::rules(), ChekCategory::msg(), ChekCategory::attr());
        $result = Category::open($request->input('state'), $id);
        if ($result) {

            $this->setMsg(200, '操作成功');
        } else {
            $this->setMsg(400, '操作失败');
        }
        return $this->responseJSON();
    }

    public function categoryValue(Request $request)
    {
        $ret = Category::categoryValue($request->input());
        if (!empty($ret)) {
            $this->setData(new CategoryValueListCollection($ret));
        }
        return $this->responseJSON();
    }
}