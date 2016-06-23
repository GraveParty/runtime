<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBodydataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bodydatas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('userid');
            $table->string('date');
            $table->float('weight');
            $table->float('height');
            $table->float('bodyfat');
            $table->float('bmi');
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
        Schema::drop('bodydatas');
    }
}
