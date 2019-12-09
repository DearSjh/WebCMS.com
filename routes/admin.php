<?php

$router->post('/admin/login', 'AdminAuthController@login'); // 登录(密码)
//$router->get('/admin/login', 'Admin\\AuthController@login'); //

//$router->group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'auth.admin'], function () use ($router) {
$router->group(['namespace' => 'Admin', 'prefix' => 'admin'], function () use ($router) {

/**
* 网站信息配置.
*/
    /**基本信息配置*/
    $router->get('/webInfo/basic', 'WebInfoController@basic');
    $router->post('/webInfo/basic', 'WebInfoController@basic');
    /**语言配置*/
    $router->get('/webInfo/languageList', 'WebInfoController@languageList');
    $router->post('/webInfo/openLanguage/{id:[0-9]+}', 'WebInfoController@openLanguage');
    /**邮箱配置*/
    $router->get('/webInfo/email', 'WebInfoController@email');
    $router->post('/webInfo/email', 'WebInfoController@email');

/**
 * 首页
*/
    $router->get('/index', 'IndexController@index');


/**
* 轮播图.
*/
    $router->get('/banner/list', 'BannerController@lists');
    $router->post('/banner/add', 'BannerController@add');
    $router->get('/banner/edit/{id:[0-9]+}', 'BannerController@edit');
    $router->post('/banner/edit/{id:[0-9]+}', 'BannerController@edit');
    $router->post('/banner/del', 'BannerController@del');
    $router->get('/banner/open/{id:[0-9]+}', 'BannerController@open');

/**
* 栏目管理
 */
    $router->get('/category/list', 'CategoriesController@lists');
    $router->post('/category/add', 'CategoriesController@add');
    $router->get('/category/edit/{id:[0-9]+}', 'CategoriesController@edit');
    $router->post('/category/edit/{id:[0-9]+}', 'CategoriesController@edit');
    $router->post('/category/del', 'CategoriesController@del');
    $router->get('/category/open/{id:[0-9]+}', 'CategoriesController@open');


/**
* 内容管理
*/
    /**常规选项*/
    $router->get('/article/list', 'ArticleController@lists');
    $router->post('/article/add', 'ArticleController@add');
    $router->get('/article/edit/{id:[0-9]+}', 'ArticleController@edit');
    $router->post('/article/edit/{id:[0-9]+}', 'ArticleController@edit');
    $router->post('/article/del', 'ArticleController@del');
    $router->get('/article/open/{id:[0-9]+}', 'ArticleController@open');

    /**SEO选项*/
    $router->get('/articleSeo/edit/{article_id:[0-9]+}', 'ArticleSeoController@edit');
    $router->post('/articleSeo/edit/{article_id:[0-9]+}', 'ArticleSeoController@edit');

    /**违禁词*/
    $router->get('/bannedWord/list', 'BannedWordController@lists');
    $router->post('/bannedWord/add', 'BannedWordController@add');
    $router->post('/bannedWord/del', 'BannedWordController@del');
    $router->get('/bannedWord/edit/{id:[0-9]+}', 'BannedWordController@edit');
    $router->post('/bannedWord/edit/{id:[0-9]+}', 'BannedWordController@edit');

/**
* 友情链接
*/
    $router->get('/friendLink/list', 'FriendLinkController@lists');
    $router->get('/friendLink/add', 'FriendLinkController@add');
    $router->post('/friendLink/add', 'FriendLinkController@add');
    $router->get('/friendLink/edit/{id:[0-9]+}', 'FriendLinkController@edit');
    $router->post('/friendLink/edit/{id:[0-9]+}', 'FriendLinkController@edit');
    $router->post('/friendLink/del', 'FriendLinkController@del');
    $router->get('/friendLink/open/{id:[0-9]+}', 'FriendLinkController@open');

/**
* 招聘管理
 */
    $router->get('/recruitment/list', 'RecruitmentController@lists');
    $router->get('/recruitment/add', 'RecruitmentController@add');
    $router->post('/recruitment/add', 'RecruitmentController@add');
    $router->get('/recruitment/edit/{id:[0-9]+}', 'RecruitmentController@edit');
    $router->post('/recruitment/edit/{id:[0-9]+}', 'RecruitmentController@edit');
    $router->post('/recruitment/del', 'RecruitmentController@del');
    $router->get('/recruitment/open/{id:[0-9]+}', 'RecruitmentController@open');

/**
*自定义数据
 */
    $router->get('/customData/list', 'CustomController@lists');
    $router->post('/customData/add', 'CustomController@add');
    $router->get('/customData/edit/{id:[0-9]+}', 'CustomController@edit');
    $router->post('/customData/edit/{id:[0-9]+}', 'CustomController@edit');
    $router->post('/customData/del', 'CustomController@del');
    $router->get('/customData/open/{id:[0-9]+}', 'CustomController@open');

/**
*在线留言
 */
    $router->get('/message/list', 'MessageController@lists');
    $router->get('/message/edit/{id:[0-9]+}', 'MessageController@edit');
    $router->post('/message/del', 'MessageController@del');

/**
 *权限管理
*/
    /**用户列表*/
    $router->get('/user/list', 'UserController@lists');
    $router->post('/user/add', 'UserController@add');
    $router->get('/user/edit/{id:[0-9]+}', 'UserController@edit');
    $router->post('/user/edit/{id:[0-9]+}', 'UserController@edit');
    $router->post('/user/del', 'UserController@del');
    $router->get('/user/open/{id:[0-9]+}', 'UserController@open');
    $router->get('/user/setRole/{id:[0-9]+}', 'UserController@setRole');

    /**角色列表*/
    $router->get('/role/list', 'RoleController@lists');
    $router->post('/role/add', 'RoleController@add');
    $router->get('/role/edit/{id:[0-9]+}', 'RoleController@edit');
    $router->post('/role/edit/{id:[0-9]+}', 'RoleController@edit');
    $router->post('/role/del', 'RoleController@del');
    $router->get('/role/setAction/{id:[0-9]+}', 'RoleController@setAction');

    /**权限列表*/
    $router->get('/action/list', 'ActionController@lists');
    $router->post('/action/add', 'ActionController@add');
    $router->get('/action/edit/{id:[0-9]+}', 'ActionController@edit');
    $router->post('/action/edit/{id:[0-9]+}', 'ActionController@edit');
    $router->post('/action/del', 'ActionController@del');

/**
* 关键词设置
*/
    $router->get('/keywordConf/edit', 'KeywordConfigController@edit');
    $router->post('/keywordConf/edit', 'KeywordConfigController@edit');


/**
 *文件上传
*/
    $router->get('/updateFile', 'UpdateFileController@updateFile');
    $router->post('/uploadImage', 'UpdateFileController@uploadImage');

});





/***获取栏目列表*/
$router->get('/admin/category/categoryValue', 'Admin\\CategoriesController@categoryValue');
/***获取角色列表*/
$router->get('/admin/role/roleValue', 'Admin\\RoleController@roleValue');
/***获取权限列表*/
$router->get('/admin/action/actionValue', 'Admin\\ActionController@actionValue');
/***获取语言列表*/
$router->post('/admin/webInfo/languageValue', 'Admin\\WebInfoController@languageValue');
