<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{

    public function run()
    {
        $teams = App\Team::all();

        factory(App\Comment::class, 20)->make()->each(function($comment) use ($teams) {
            $comment->team_id = $teams->random()->id;
            $comment->save();
    });
}
}
