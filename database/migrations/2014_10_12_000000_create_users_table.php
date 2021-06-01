<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('用户名');
            $table->char('phone', 11)->comment('手机号');
            $table->string('email')->unique()->comment('邮箱');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->comment('用户密码');
            $table->unsignedTinyInteger('role')->default(0)->comment('角色:0-普通用户/1-管理员');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
