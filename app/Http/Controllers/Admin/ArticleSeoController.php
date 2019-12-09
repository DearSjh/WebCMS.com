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
use App\Models\Admin\ArticleSeo;

class ArticleSeoController extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function edit(Request $request, $articleId)
    {

        if ($request->isMethod('post')) {
            $date = ArticleSeo::updateArticleSeo($request->input(), $articleId);
            if ($date) {
                $this->setMsg(200, '操作成功');
            } else {
                $this->setMsg(400, '操作失败');
            }
            return $this->responseJSON();
        } else {
            $result = ArticleSeo::detail($articleId);
            $this->setData($result ?? []);
        }
        return $this->responseJSON();
    }

    public function del(Request $request)
    {
        $ret = ArticleSeo::del($request->input('ids', []));
        if (!$ret) {
            $this->setMsg(500, '删除失败');
        }
        return $this->responseJSON();
    }
}