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
use App\Service\Utils;
use GuzzleHttp\Client;

class KeywordController extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function keywordRankingList(Request $request)
    {
        $conditions = $request->all();
        $conditions['id'] = RANKING_SECRET_ID;
        $conditions['time'] = time();
        $conditions['sign'] = Utils::rankingSign($conditions);
        $client = new Client();
        $res = $client->request('POST', 'http://ranking.lin-ju-le.com/ranking', ['form_params' => $conditions]);
        $body = $res->getBody();
        $remainingBytes = $body->getContents();

        return json_decode($remainingBytes, true);
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