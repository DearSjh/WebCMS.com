<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2019/11/11
 * Time: 18:23
 */

namespace App\Http\Controllers\Web;


use App\Http\Controllers\Controller;
use App\Models\Email;
use App\Models\Messages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    /**
     * @param Request $request
     * @return mixed|string
     * @throws \Throwable
     */
    public function index(Request $request)
    {

        if ($request->isXmlHttpRequest() === true || $request->method() == 'POST') {


//            $code = $request->get('code', '');
//
//            $key = $_COOKIE['captcha'] ?? '';
//            if (app('captcha')->check($code, $key) === false) {
//                $this->setMsg(-1, '验证码错误');
//                return $this->responseJSON();
//            }

            $ipKey = $request->ip();
            if (Cache::has($ipKey)) {
                return $this->responseJSON();
            }
            Cache::add($ipKey, 1, 10);

            try {

                $add = Messages::add($request->input());
                if (empty($add)) {
                    Throw new \Exception('在线留言失败');
                }

                $email = Email::first();

                if (!empty($email->to_email)) {
                    $title = $email->title;
                    $toMail = $email->to_email;
                    $content = "标题：{$add->title}\r\n姓名：{$add->name}\r\n手机：{$add->phone}\r\n邮箱：{$add->email}\r\n详细地址：{$add->address}\r\n留言内容：{$add->content}";

                    Mail::raw($content, function ($message) use ($title, $toMail) {
                        $message->subject($title );
                        $message->to($toMail);
                    });
                }


            } catch (\Exception $e) {
                $this->setMsg(500, $e->getMessage());
            }

            return $this->responseJSON();
        }

        return $this->view('message');
    }
}