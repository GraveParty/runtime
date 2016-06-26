<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorAsksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::create ( 'doctor_asks', function (Blueprint $table) {
    		$table->increments ( 'id' );
    		$table->integer ( 'userid' );
            $table->integer ('doctorid');
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
    	Schema::drop('doctor_asks');
    }
}
