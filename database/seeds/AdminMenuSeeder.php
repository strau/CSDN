<?php

use Illuminate\Database\Seeder;

class AdminMenuSeeder extends Seeder
{
    private $created_at = null;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\System\AdminMenu::query()
            ->insert([
                [
                    'id' => 1,
                    'up_id' => 0,
                    'route' => null,
                    'name' => '系统管理',
                    'name_path' => '/系统管理/',
                    'id_path' => '/1/',
                    'icon' => 'el-icon-setting',
                    'level' => 1,
                    'created_at' => $this->getCreateTime(),
                    'updated_at' => $this->getUpdateTime(),
                ],
                [
                    'id' => 2,
                    'up_id' => 1,
                    'route' => '/admin/menu',
                    'name' => '菜单管理',
                    'name_path' => '/系统管理/菜单管理/',
                    'id_path' => '/1/2/',
                    'icon' => 'el-icon-menu',
                    'level' => 2,
                    'created_at' => $this->getCreateTime(),
                    'updated_at' => $this->getUpdateTime(),
                ],
                [
                    'id' => 3,
                    'up_id' => 1,
                    'route' => '/admin/permission',
                    'name' => '权限管理',
                    'name_path' => '/系统管理/权限管理/',
                    'id_path' => '/1/3/',
                    'icon' => 'el-icon-more',
                    'level' => 2,
                    'created_at' => $this->getCreateTime(),
                    'updated_at' => $this->getUpdateTime(),
                ],
                [
                    'id' => 4,
                    'up_id' => 1,
                    'route' => '/admin/role',
                    'name' => '角色管理',
                    'name_path' => '/系统管理/角色管理/',
                    'id_path' => '/1/4/',
                    'icon' => 'el-icon-info',
                    'level' => 2,
                    'created_at' => $this->getCreateTime(),
                    'updated_at' => $this->getUpdateTime(),
                ],
            ]);
    }

    private function getCreateTime()
    {
        $this->created_at = date('Y-m-d H:i:s', time() + mt_rand(-100000, 0));
        return $this->created_at;
    }

    private function getUpdateTime()
    {
        return date('Y-m-d H:i:s', strtotime($this->created_at) + mt_rand(0,60));
    }
}
