<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call('UsersSeeder');
        $this->call('AuthorsSeeder');
        $this->call('BooksSeeder');

        $this->command->info('Таблицы загружены данными!');
    }
}
