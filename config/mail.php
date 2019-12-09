<?php

return [
    'driver' => "smtp",
    'host' => "smtp.qq.com", // 根据你的邮件服务提供商来填
    'port' => "465",
    'encryption' => "ssl", // 同上 一般是tls或ssl
    'username' => '454210545', //你smtp服务的账号
    'password' => 'cufpcpazoeuqbgbg', //你smtp服务的密码
    'from' => [
        'address' => '454210545@qq.com',  //接收者邮箱显示的来源邮箱地址
        'name' => '测试', //接收者邮箱显示的来源名称
    ],
];