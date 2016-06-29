<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivityStoreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activityStores', function(Blueprint $table){
        $table->increments('id');
        $table->string('Theme');
        $table->string('Time');
        $table->integer('peopleNumber');
        $table->float('Money');
        $table->string('Description');
        $table->string('PlanList');
        $table->string('Field');
        $table->string('Tag');
        $table->integer('UserID');
        $table->integer('State');
        $table->string('Type');
        $table->string('UserName');

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
        //
    }
}
