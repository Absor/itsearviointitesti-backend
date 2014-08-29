<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
	    $this->call('TestTableSeeder');
        $this->call('InterpretationTableSeeder');
        $this->call('ClaimTableSeeder');
        $this->call('UserTableSeeder');
	}

}
