<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWeiboCollectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weibo_collects', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('weibo_id')->unsigned()->index();
            $table->foreign('weibo_id')->references('id')->on('weibos')->onDelete('cascade');
            $table->integer('collector_id')->unsigned()->index();
            $table->foreign('collector_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::drop('weibo_collects');
    }
}
