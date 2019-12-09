<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/31
 * Time: 15:26
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Service\Utils;

class UpdateFileController extends Controller
{

    public function updateFile(Request $request)
    {
        $moveFile = [];
        $action = $request->input('action');
        if ($action == 'config') {
            $fileDir = dirname(dirname(dirname(dirname(dirname(__FILE__))))) . '/public/UEditor/php/config.json';
            $CONFIG = json_decode(preg_replace("/\/\*[\s\S]+?\*\//", "", file_get_contents($fileDir)), true);
            return $CONFIG;
        }

        if ($action == 'uploadimage') {
            $file = $_FILES;
            if (empty($file['upfile'])) {
                $this->setData(['state' => 'SUCCESS']);
                return $this->responseJSON();
            }
            $fileDate = UpdateFileController::moveFile($file['upfile']);
            $moveFile = [
                "state" => 'SUCCESS',
                "url" => $fileDate['url'],
                "title" => $fileDate['title'],
                "original" => $file['upfile']['name'],
                "type" => strtolower(strrchr($file['upfile']['name'], '.')),
                "size" => $file['upfile']['size']
            ];
        }

        return $moveFile;
    }

    /**
     * 图片上传
     * @return string
     */
    public function uploadImage(Request $request)
    {
        set_time_limit(0);
        $folder = $request->input('folder', 'status');
        $result = Utils::moveFiles($_FILES, "/public/upload/{$folder}/");
        if ($result) {
            $this->setData($result);
            $this->setMsg(200, '操作成功');
        } else {
            $this->setMsg(400, '操作失败');
        }
        return $this->responseJSON();
    }

    /**
     * 移动文件
     * @return string
     */
    public function moveFile($file)
    {
        $fileDir = dirname(dirname(dirname(dirname(dirname(__FILE__))))) . '/public/upload/articleImg/';

        if (!file_exists($fileDir)) {
            //检查是否有该文件夹，如果没有就创建，并给予最高权限
            mkdir($fileDir, 0777, true);
        }
        $newFileName = substr(str_shuffle(md5(date('YmdHis', time()))), 8, 16) . strrchr($file['name'], '.');

        if (!move_uploaded_file($file['tmp_name'], $fileDir . $newFileName)) {
            throw new \Exception('上传失败');
        }

        return [
            'url' => '/upload/articleImg/' . $newFileName,
            'title' => $newFileName
        ];
    }

}