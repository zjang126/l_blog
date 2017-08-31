<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {//数据库迁移文件  ,直接设计好字段，自动生成数据库表
        //php artisan make:migration create_links_table
        //php artisan migrate
        Schema::create('links', function (Blueprint $table) {
            $table->engine='MyISAM';
            $table->increments('link_id');
            $table->string('link_name')->default('')->comment('//名称');
            $table->string('link_title')->default('')->comment('//标题');
            $table->string('link_url')->default('')->comment('//链接');
            $table->integer('link_order')->default(0)->comment('//排序');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('links');
    }
}
