<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tests', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
            $table->string('title');
            $table->integer('maxChosenPerGroup');
            $table->integer('showInterpretationThreshold');
            $table->text('descriptionPageText');
            $table->text('testPagesText');
            $table->text('interpretationPageText');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tests');
	}

}
