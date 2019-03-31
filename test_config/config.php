<?php
return [
    // 是否开启路由
    'url_route_on'           => true,
    // 是否强制使用路由
    'url_route_must'         => false,
    //设置验证码
    'captcha'               => [
        //验证码字符集
        'codeSet'      => '23456789abcdefhijkmnpqrstuvwxyzABCDEFHIJKMNPQRSTUVWXYZ',
        //设置验证码字体大小
        'fontSize'     => 20,
        //添加混淆曲线
        'useCurve'     => false,
        //设置图片大小
        'imageW'       => 150,
        'imageH'       => 40,
        //验证码位数
        'length'       => 4,
        //验证码重置
        'reset'        => true,
    ],
];