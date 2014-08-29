<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInterpretationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('interpretations', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
            $table->integer('test_id')->unsigned();
            $table->string('category');
            $table->string('type');
            $table->string('text');
            $table->string('color');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('interpretations');
	}

}
