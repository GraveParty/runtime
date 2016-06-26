<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoachAsksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create ( 'coach_asks', function (Blueprint $table) {
			$table->increments ( 'id' );
			$table->integer ( 'userid' );
            $table->integer ('coachid');
            $table->string('title');
            $table->string('content');
            $table->string('kind');
            $table->integer('state');
			$table->timestamps ();
		} );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    	Schema::drop('coach_asks');
    }
}
