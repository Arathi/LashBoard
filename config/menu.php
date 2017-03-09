<?php
return [
    // default, json, db
    'menu-config' => 'default',

    // 如果从JSON文件中获取菜单，在此项中填写文件名
    'json-file' => '',

    // 如果从数据库中获取菜单，在此项中填写菜单相关的模型
    'menu-model' => null,

    'default-menu' => [
        [
            'style' => 'header',
            'caption' => '平台管理',
            'icon' => null,
            'url' => '#',
        ],
        [
            'style' => '',
            'caption' => '用户管理',
            'icon' => 'fa fa-user',
            'url' => url('admin/user'),
        ],
        [
            'style' => '',
            'caption' => '角色管理',
            'icon' => 'fa fa-users',
            'url' => url('admin/role'),
        ],
        [
            'style' => '',
            'caption' => '菜单管理',
            'icon' => 'fa fa-list',
            'url' => url('admin/menu'),
        ],
        [
            'style' => '',
            'caption' => '权限管理',
            'icon' => 'fa fa-user-secret',
            'url' => url('admin/auth'),
        ],
    ],
];
