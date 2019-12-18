<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

include_once 'admin.php';


//$router->get('/test[/{cateId1}[/{cateId2}[/{cateId3}]]]', function (){
//E
//    return view('web.test');
//});


$router->get('/test[/{cateId1}[/{cateId2}[/{cateId3}[/{cateId4}]]]]', 'Web\\TestController@index');
$router->get('/', 'Web\\IndexController@index');
$router->get('/aboutUs[/{cateId1}[/{cateId2}[/{cateId3}[/{cateId4}]]]]', 'Web\\AboutUsController@index'); // 关于我们
$router->get('/contactUs[/{cateId1}[/{cateId2}[/{cateId3}[/{cateId4}]]]]', 'Web\\ContactUsController@index'); // 联系我们
$router->get('/download[/{cateId1}[/{cateId2}[/{cateId3}[/{cateId4}]]]]', 'Web\\DownloadController@index'); // 下载
$router->get('/news[/{cateId1}[/{cateId2}[/{cateId3}[/{cateId4}]]]]', 'Web\\NewsController@index'); // 新闻
$router->get('/product[/{cateId1}[/{cateId2}[/{cateId3}[/{cateId4}]]]]', 'Web\\ProductController@index'); // 产品
$router->get('/case[/{cateId1}[/{cateId2}[/{cateId3}[/{cateId4}]]]]', 'Web\\CaseController@index'); // 案例
$router->get('/job[/{cateId1}[/{cateId2}[/{cateId3}[/{cateId4}]]]]', 'Web\\JobController@index'); // 招聘
$router->get('/solution[/{cateId1}[/{cateId2}[/{cateId3}[/{cateId4}]]]]', 'Web\\SolutionController@index'); // 解决方案
$router->get('/service[/{cateId1}[/{cateId2}[/{cateId3}[/{cateId4}]]]]', 'Web\\ServiceController@index'); //
$router->get('/message[/{cateId1}[/{cateId2}[/{cateId3}[/{cateId4}]]]]', 'Web\\MessageController@index'); // 留言
$router->post('/message[/{cateId1}[/{cateId2}[/{cateId3}[/{cateId4}]]]]', 'Web\\MessageController@index'); // 留言
$router->get('/col', 'Web\\TongJiController@collect'); // 统计
$router->get('/captcha', 'Web\\CaptchaController@create'); // 验证码
$router->get('/delCache', 'Web\\CacheController@del'); // 清除缓存





