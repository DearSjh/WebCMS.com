<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2019/11/5
 * Time: 16:38
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Articles;
use App\Http\Requests\Admin\Articles\AddArticles;
use App\Http\Requests\Admin\Articles\UpdateArticles;
use App\Http\Requests\Admin\Category\ChekCategory;
use App\Http\Resources\Admin\Article\ArticleListCollection;

class ArticleController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function lists(Request $request)
    {
        $conditions = $request->all();
        $page = $request->input('page', 0);
        $perPage = $request->input('perPage', 10);

        $list = Articles::articlesList($conditions, $perPage, $page);

        if (!empty($list)) {
            $this->setData(new ArticleListCollection($list));
        }

        return $this->responseJSON();

    }

    public function add(Request $request)
    {
        $this->validate($request, AddArticles::rules(), AddArticles::msg(), AddArticles::attr());
        $result = Articles::addArticles($request->input());
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

            $this->validate($request, UpdateArticles::rules(), UpdateArticles::msg(), UpdateArticles::attr());
            $date = Articles::updateArticles($request->input(), $id);
            if ($date) {
                $this->setMsg(200, '操作成功');
            } else {
                $this->setMsg(400, '操作失败');
            }
            return $this->responseJSON();
        } else {
            $result = Articles::detail($id);
            $this->setData($result ?? []);
        }
        return $this->responseJSON();
    }

    public function del(Request $request)
    {
        $ret = Articles::del($request->input('ids', []));
        if (!$ret) {
            $this->setMsg(500, '删除失败');
        }
        return $this->responseJSON();
    }

    public function open(Request $request, $id)
    {
        $this->validate($request, ChekCategory::rules(), ChekCategory::msg(), ChekCategory::attr());
        $result = Articles::open($request->input('state'), $id);
        if ($result) {

            $this->setMsg(200, '操作成功');
        } else {
            $this->setMsg(400, '操作失败');
        }
        return $this->responseJSON();
    }
}