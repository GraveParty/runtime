<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateReplyTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create ( 'replies', function (Blueprint $table) {
			$table->increments ( 'id' );
			$table->integer ( 'user_id' );
			$table->integer ( 'coach_id' );
			$table->integer ( 'question_id' );
			$table->text ( 'reply' )->nullable ();
			$table->string ( 'oneDayRecipes' )->nullable ();
			$table->string ( 'oneWeekRecipes' )->nullable ();
			$table->string ( 'exerciseItems' )->nullable ();
			$table->integer ( 'mark' )->nullable ();
			$table->timestamps ();
		} );
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		//
	}
}
