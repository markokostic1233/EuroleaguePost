<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        if($this->command->confirm('Do you want to refresh database')){

           $this->command->call('migrate:refresh');
           $this->command->line('Database was refreshed successfully');

         }

     $this->call([





                  UsersTableSeeder::class,
                  TeamsTableSeeder::class,
                  CommentsTableSeeder::class

                  ]);







    }
}
