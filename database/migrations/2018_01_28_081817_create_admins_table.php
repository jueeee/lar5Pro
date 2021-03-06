<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->increments('id')->comment('ID');
            $table->string('user_name',50)->default('')->comment('管理员昵称');
            $table->string('picture',255)->default('')->comment('管理员头像');
            $table->string('password',120)->default(md5(base64_encode('123456')))->comment('管理员登录密码');
            $table->integer('role_id')->default(0)->comment('角色ID');
            $table->timestamps();
            $table->tinyInteger('status')->default(1)->comment('状态标识');
            $table->string('content',500)->default('世界上没有两片完全相同的叶子！')->comment('备注信息');
            $table->engine = 'MyISAM ';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
}
