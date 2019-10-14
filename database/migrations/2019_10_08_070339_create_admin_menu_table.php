<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_menu', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('up_id')->unsigned()->default(0)->comment('上级菜单的id');
            $table->string('route', 100)->nullable()->comment('点击菜单要跳转到的(前端)路由');
            $table->string('name', 15)->comment('菜单的名称');
            $table->string('name_path',200)->nullable()->comment('菜单名称path，以/开始，以/结束，如：/系统管理/菜单管理/');
            $table->string('id_path',100)->nullable()->comment('菜单id path，以/开始，以/结束，如：/1/5/');
            $table->string('icon', 50)->nullable()->comment('菜单的icon图标');
            $table->tinyInteger('level')->unsigned()->default(1)->comment('菜单的等级，顶级菜单为等级为1(等级数为id_path中的id的个数)');
            $table->smallInteger('sort')->unsigned()->default(10000)->comment('排序');
            $table->timestamps();
            $table->softDeletes();

            $table->engine    = 'InnoDB';
            $table->charset   = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
        });

        \Illuminate\Support\Facades\DB::statement("ALTER TABLE `admin_menu` comment '系统菜单表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_menu');
    }
}
