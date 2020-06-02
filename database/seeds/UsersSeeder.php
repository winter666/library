<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
        	[
        		'name' => 'admin', 
        		'email' => 'admin@example.com', 
        		'password' => Hash::make('testPassword'), 
        		'is_admin' => '1', 
        	]
        );
    }
}
