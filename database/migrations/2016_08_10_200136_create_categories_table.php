<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('cat_id');
            $table->string('cat_name',90)->comment('');
            $table->string('keywords',255)->default('')->comment('');
            $table->text('cat_desc')->nullable()->comment('');
            $table->unsignedInteger('parent_id')->default(0)->comment('');
            $table->unsignedSmallInteger('sort_order')->default(100)->comment('');
            $table->string('template_file',50)->default('')->comment('');
            $table->string('measure_unit',15)->default('')->comment('');
            $table->boolean('show_in_nav')->default(false)->comment('');
            $table->string('style',150)->default('')->comment('');
            $table->boolean('is_show')->default(true)->comment('');
            $table->boolean('grade')->default(false)->comment('');
            $table->string('file_attr',255)->default('')->comment('');
            $table->boolean('is_top_style')->default(false)->comment('');
            $table->string('top_style_tpl',255)->default('')->comment('');
            $table->string('cat_icon',255)->default('')->comment('');
            $table->boolean('is_top_show')->default(false)->comment('');
            $table->text('category_links')->nullable()->comment('');
            $table->text('category_topic')->nullable()->comment('');
            $table->text('pinyin_keyword')->nullable()->comment('');
            $table->string('cat_alias_name',255)->default('')->comment('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
