<?php

use Illuminate\Database\Seeder;

class TeamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = App\User::all();

        factory(App\Team::class, 10)->make()->each(function($team) use ($users){
        $team->user_id = $users->random()->id;
        $team->save();
      });
    }
}
