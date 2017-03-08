<?php

return [
    // CDN站点信息
    'cdns' => [
        'disable' => [
            'name' => 'local',
            'description' => '不使用CDN',
        ],
        'bootcdn' => [
            'name' => 'BootCDN',
            'description' => '稳定、快速、免费的前端开源项目 CDN 服务',
            'base_url' => '//cdn.bootcss.com'
        ],
        'qiniu' => [
            'name' => '七牛云存储',
            'description' => 'CDN 加速由七牛云提供，技术社区掘金支持',
            'base_url' => '//www.staticfile.org'
        ]
    ],

    // 默认CDN
    'default-cdn' => 'bootcdn',

    // 前端库
    'libs' => [
        'jquery' => [
            'name' => 'jQuery',
            'version' => '2.2.4',
        ],
        'bootstrap' => [
            'name' => 'Bootstrap',
            'version' => '3.3.7',
        ],
        'admin-lte' => [
            'name' => 'AdminLTE',
            'version' => '2.3.8',
        ],
        'font-awesome' => [
            'name' => 'Font Awesome',
            'version' => '4.7.0',
        ],
        'ionicons' => [
            'name' => 'ionicons',
            'version' => '2.0.1',
        ],
        'iCheck' => [
            'name' => 'iCheck',
            'version' => '1.0.2'
        ]
    ]
];
