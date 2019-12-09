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
use App\Models\Admin\BannedWord;
use App\Http\Resources\Admin\BannedWord\BannedWordListCollection;
use App\Http\Requests\Admin\BannedWord\AddBannedWord;
use Illuminate\Support\Facades\Cache;

class BannedWordController extends Controller
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

        $list = BannedWord::bannedWordList($conditions, $perPage, $page);
        if (!empty($list)) {
            $this->setData(new BannedWordListCollection($list));
        }

        return $this->responseJSON();
    }

    public function edit(Request $request, $id)
    {
        if ($request->isMethod('post')) {
            $this->validate($request, AddBannedWord::rules(), AddBannedWord::msg(), AddBannedWord::attr());
            BannedWord::checkUpdateInfo($request->input(), $id);
            $date = BannedWord::updateBannedWord($request->input(), $id);
            if ($date) {
                $bannedKey = 'banned_words';
                Cache::forget($bannedKey);
                $this->setMsg(200, '操作成功');
            } else {
                $this->setMsg(400, '操作失败');
            }
        } else {
            $result = BannedWord::detail($id);
            $this->setData($result ?? []);
        }
        return $this->responseJSON();
    }

    public function add(Request $request)
    {
        $this->validate($request, AddBannedWord::rules(), AddBannedWord::msg(), AddBannedWord::attr());
        BannedWord::checkUpdateInfo($request->input());
        $result = BannedWord::addBannedWord($request->input());
        if ($result) {
            $bannedKey = 'banned_words';
            Cache::forget($bannedKey);
            $this->setMsg(200, '操作成功');
        } else {
            $this->setMsg(400, '操作失败');
        }
        return $this->responseJSON();
    }

    public function del(Request $request)
    {
        $ret = BannedWord::del($request->input('ids', []));
        if (!$ret) {
            $this->setMsg(500, '删除失败');
        }
        return $this->responseJSON();
    }
}