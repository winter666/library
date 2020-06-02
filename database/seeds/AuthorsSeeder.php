<?php

use Illuminate\Database\Seeder;

class AuthorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('authors')->insert(['name' => 'Michael Connelly']);
        DB::table('authors')->insert(['name' => 'J. M. Coetzee']);
        DB::table('authors')->insert(['name' => 'James Nestor']);
        DB::table('authors')->insert(['name' => 'Patrik Svensson']);
        DB::table('authors')->insert(['name' => 'David Heska Wanbli Weiden']);
        DB::table('authors')->insert(['name' => 'Daniel Kehlmann']);
    }
}
