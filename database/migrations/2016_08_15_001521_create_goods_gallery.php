<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsGallery extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('goods_gallery', function (Blueprint $table) {
            $table->increments('img_id');
            $table->unsignedInteger('goods_id')->comment('商品id');
            $table->string('img_url',255)->comment('大图');
            $table->string('thumb_url',255)->comment('小图');
            $table->string('original_url',255)->comment('原图');
            $table->string('img_desc',255)->comment('图片描述');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('goods_gallery');
    }
}
