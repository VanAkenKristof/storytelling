<?php

use Illuminate\Database\Seeder;

class VoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $stories = \App\Story::all();

        foreach ($stories as $story) {
            for($i = 0; $i < rand(1, 50); $i++) {
                $vote = new \App\Vote();

                $vote->story_id = $story->id;
                $vote->user_id = rand(1, 20);

                $vote->save();
            }
        }
    }
}
