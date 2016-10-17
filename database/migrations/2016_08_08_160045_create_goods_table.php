<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods', function (Blueprint $table) {
            $table->increments('goods_id')->comment('ID');
            $table->unsignedSmallInteger('cat_id')->default(0)->comment('商品类别');
            $table->string('goods_sn',60)->default('')->comment('商品货号');
            $table->string('goods_name',120)->comment('商品名称');
            $table->string('goods_barcode',60)->default('')->comment('商品条码');
            $table->unsignedInteger('click_count')->default(0)->comment('点击次数');
            $table->unsignedSmallInteger('brand_id')->default(0)->comment('品牌ID');
            $table->unsignedSmallInteger('goods_number')->default(0)->comment('库存数量');
            $table->decimal('goods_weight',10,3)->default(0)->comment('商品重量');
            $table->decimal('market_price',10,2)->default(0)->comment('市场价格');
            $table->decimal('shop_price',10,2)->default(0)->comment('本店价格');
            $table->boolean('is_promote')->default(false)->comment('是否促销');
            $table->decimal('promote_price',10,2)->default(0)->comment('促销价格');
            $table->unsignedInteger('promote_start_date')->default(0)->comment('促销开始时间');
            $table->unsignedInteger('promote_end_date')->default(0)->comment('促销结束时间');
            $table->unsignedSmallInteger('warn_number')->default(0)->comment('库存警告数量');
            $table->string('keywords',255)->default('')->comment('关键字');
            $table->text('goods_desc')->nullable()->comment('商品详情');
            $table->string('goods_brief',255)->default('')->comment('简明信息');
            $table->unsignedInteger('img_id')->default(0)->comment('封面图');
            $table->string('goods_thumb',255)->default('')->comment('商品缩略图');
            $table->string('goods_img',255)->default('')->comment('商品图');
            $table->string('original_img',255)->default('')->comment('商品原图');
            $table->boolean('is_real')->default(true)->comment('实际商品');
            $table->string('extension_code',30)->default('')->comment('扩展代码');
            $table->boolean('is_on_sale')->default(true)->comment('上架');
            $table->boolean('is_alone_sale')->default(true)->comment('能作为普通商品销售');
            $table->boolean('is_shipping')->default(false)->comment('是否为免运费商品');
            $table->unsignedInteger('add_time')->default(0)->comment('新增时间');
            $table->unsignedSmallInteger('sort_order')->default(100)->comment('排序');
            $table->boolean('is_delete')->default(false)->comment('是否删除');
            $table->boolean('is_best')->default(false)->comment('是否精品');
            $table->boolean('is_new')->default(false)->comment('是否新品');
            $table->boolean('is_hot')->default(false)->comment('是否热销');
            $table->unsignedInteger('suppliers_id')->default(0)->comment('供货商');
            $table->string('seller_note',255)->default('')->comment('商家备注');
            $table->unsignedInteger('last_time')->default(0)->comment('新增时间');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('goods');
    }
}
