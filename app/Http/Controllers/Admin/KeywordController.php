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
use App\Models\Admin\KeywordConfig;
use App\Models\Admin\KeywordRanking;
use App\Http\Resources\Admin\KeywordRanking\KeywordRankingListCollection;

class KeywordController extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function keywordRankingList(Request $request)
    {
        $conditions = $request->all();
        $page = $request->input('page', 0);
        $perPage = $request->input('perPage', 15);

        $list = KeywordRanking::keywordRankingList($conditions, $perPage, $page);
        if (!empty($list)) {
            $this->setData(new KeywordRankingListCollection($list));
        }

        return $this->responseJSON();
    }

    public function edit(Request $request)
    {

        if ($request->isMethod('post')) {
            $date = KeywordConfig::updateConfig($request->input());
            if ($date) {
                $this->setMsg(200, '操作成功');
            } else {
                $this->setMsg(400, '操作失败');
            }

        } else {
            $config = KeywordConfig::select('*')->first();
            if (!empty($config)) {
                $this->setData($config);
            }
        }
        return $this->responseJSON();
    }
}