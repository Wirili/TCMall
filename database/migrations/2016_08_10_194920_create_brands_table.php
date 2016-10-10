<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brands', function (Blueprint $table) {
            $table->increments('brand_id');
            $table->string('brand_name',60)->comment('品牌名称');
            $table->string('brand_letter',60)->comment('');
            $table->string('brand_logo',60)->comment('品牌logo');
            $table->text('brand_desc')->comment('详细描述');
            $table->string('site_url',60)->comment('网站连接');
            $table->unsignedSmallInteger('sort_order')->default(100)->comment('排序');
            $table->boolean('is_show')->default(true)->comment('是否显示');
            $table->boolean('is_delete')->default(false)->comment('是否删除');
            $table->boolean('audit_status')->default(true)->comment('');
            $table->unsignedInteger('add_time')->default(0)->comment('添加时间');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('brands');
    }
}
