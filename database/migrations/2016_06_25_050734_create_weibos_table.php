<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWeibosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weibos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('author_id');
            $table->timestamp('published_at');
            $table->string('title');
            $table->text('intro');
            $table->text('content');
            $table->integer('collect_count');
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
        Schema::drop('weibos');
    }
}
