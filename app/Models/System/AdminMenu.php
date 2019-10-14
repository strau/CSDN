<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Model;

class AdminMenu extends Model
{
    protected $table = 'admin_menu';

    public function getMenus()
    {
        return AdminMenu::query();
    }
}
