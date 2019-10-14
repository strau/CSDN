<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    // 后台首页
    public function index()
    {
        $menus = [
//            [
//                'id' => 0,
//                'name' => '首页',
//                'route' => '',
//                'child' => []
//            ],
            [
                'id' => 1,
                'name' => '菜单一',
                'route' => '',
                'child' => [
                    [
                        'id' => 2,
                        'name' => '子菜单1-1',
                        'route' => '/admin',
                        'query' => []
                    ],
                    [
                        'id' => 3,
                        'name' => '子菜单1-2',
                        'route' => '/admin/index',
                        'query' => []
                    ],
                    [
                        'id' => 4,
                        'name' => '子菜单1-3',
                        'route' => '/admin/index',
                        'query' => []
                    ],
                ]
            ],
            [
                'id' => 5,
                'name' => '菜单二',
                'route' => '',
                'child' => [
                    [
                        'id' => 6,
                        'name' => '子菜单2-1',
                        'route' => '/admin',
                        'query' => []
                    ],
                    [
                        'id' => 7,
                        'name' => '子菜单2-2',
                        'route' => '/admin/index',
                        'query' => []
                    ],
                    [
                        'id' => 8,
                        'name' => '子菜单2-3',
                        'route' => '/admin/index',
                        'query' => []
                    ],
                ]
            ],
        ];
        $user = ['id' => 1, 'name' => '喜羊羊'];
        return ['code' => '00000', 'msg' => 'ok', 'data' => ['menus' => $menus, 'user' => $user]];
    }
}
