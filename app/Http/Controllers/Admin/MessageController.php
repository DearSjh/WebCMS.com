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
use App\Models\Admin\Message;
use App\Http\Resources\Admin\Message\MessageListCollection;
use App\Http\Requests\Admin\Message\ChekMessage;

class MessageController extends Controller
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

        $list = Message::messageList($conditions, $perPage, $page);
        if (!empty($list)) {
            $this->setData(new MessageListCollection($list));
        }

        return $this->responseJSON();
    }

    public function edit(Request $request, $id)
    {
        $result = Message::detail($id);

        $this->setData($result ?? []);
        return $this->responseJSON();
    }

    public function open(Request $request, $id)
    {
        $this->validate($request, ChekMessage::rules(), ChekMessage::msg(), ChekMessage::attr());
        $result = Message::open($request->input('state'), $id);
        if ($result) {

            $this->setMsg(200, '操作成功');
        } else {
            $this->setMsg(400, '操作失败');
        }
        return $this->responseJSON();
    }

    public function del(Request $request)
    {
        $ret = Message::del($request->input('ids', []));
        if (!$ret) {
            $this->setMsg(500, '删除失败');
        }
        return $this->responseJSON();
    }
}