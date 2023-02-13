<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_users', function (Blueprint $table) {
            $table->id()->comment('管理ユーザーID');
            $table->string('name', 50)->comment('管理ユーザー名');
            $table->string('email', 100)->comment('Eメールアドレス');
            $table->string('password')->comment('パスワード');
            $table->boolean('is_publish')->comment('公開フラグ');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_users');
    }
};
