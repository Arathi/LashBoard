<?php
return [
    // json, db
    'config_mode' => 'db',

    // 如果从JSON文件中获取菜单，在此项中填写文件名
    'json_file' => '',

    // 如果从数据库中获取菜单，在此项中填写菜单相关的模型
    'menu_model' => App\Models\Menu::class,

    /*
    'default_menu' => [
        'platform_mgmt' => [
            'style' => 'header',
            'caption' => '平台管理',
            'icon' => '',
            'url' => '#',
        ],
        'user_mgmt' => [
            'style' => '',
            'caption' => '用户管理',
            'icon' => 'fa fa-user',
            'url' => url('admin/user'),
        ],
        'role_mgmt' => [
            'style' => '',
            'caption' => '角色管理',
            'icon' => 'fa fa-users',
            'url' => url('admin/role'),
        ],
        'menu_mgmt' => [
            'style' => '',
            'caption' => '菜单管理',
            'icon' => 'fa fa-list',
            'url' => url('admin/menu'),
        ],
        'auth_mgmt' => [
            'style' => '',
            'caption' => '权限管理',
            'icon' => 'fa fa-user-secret',
            'url' => url('admin/auth'),
        ]
    ]
    */
];
