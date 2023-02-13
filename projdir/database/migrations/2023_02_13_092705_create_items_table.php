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
        Schema::create('items', function (Blueprint $table) {
            $table->id()->comment('商品ID');
            $table->unsignedBigInteger('genre_id')->comment('ジャンルID');
            $table->foreign('genre_id', 'items_foreign_01')->references('id')->on('genres');
            $table->string('name', 50)->comment('商品名');
            $table->unsignedInteger('price')->comment('価格');
            $table->string('image')->comment('商品画像URL');
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
        Schema::dropIfExists('items');
    }
};
