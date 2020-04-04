<?php

return [
    // ----------------------- 权限配置 ----------------------- //

    'authItem' => [

    ],

    // ----------------------- 快捷入口 ----------------------- //

    'cover' => [
        [
            'title' => '首页入口',
            'route' => 'index/index',
            'params' => []
        ],
    ],

    // ----------------------- 菜单配置 ----------------------- //
    'menuConfig' => [
         'location' => 'addons', // default:系统顶部菜单;addons:应用中心菜单
         'icon' => 'fa fa-puzzle-piece',
    ],

    'menu' => [

    ],
];