<?php

class UserTableSeeder extends Seeder {

    public function run()
    {
        Eloquent::unguard();

        DB::table('users')->delete();

        User::create(array(
            'email' => 'test@test.com',
            'password' => Hash::make('test')
        ));

        Eloquent::guard();
    }
}