<?php

namespace App\Http\Controllers\Admin\System;

use App\Http\Controllers\Controller;
use App\Http\Resources\System\Menu;
use App\Http\Resources\System\MenuCollection;
use App\Models\System\AdminMenu;
use Illuminate\Http\Request;

// 后台侧边栏菜单控制器
class MenuController extends Controller
{
    public function index(AdminMenu $menu)
    {
        $menus = $menu->getMenus()->select(['id', 'name'])->get();
        return new MenuCollection($menus);
    }

    public function show()
    {
        dd($this->hasCode('00011'));exit;
        $menu = AdminMenu::find(10);
        return new Menu($menu);
    }
}