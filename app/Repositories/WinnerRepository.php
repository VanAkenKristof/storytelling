<?php
/**
 * Created by PhpStorm.
 * User: Dyroth
 * Date: 02-Nov-18
 * Time: 20:02
 */

namespace App\Repositories;


use App\Period;
use App\Story;
use App\User;
use App\Vote;
use App\Winner;

class WinnerRepository
{

    public function createTop5()
    {
        $period = Period::find(3);

        if (!$period->assignment_complete) {
            $votes = collect();

            $stories = Story::all();

            foreach ($stories as $story) {
                $votes->put($story->id, ['votes' => $story->votes()->count()]);
            }

            $top5 = $votes->sortByDesc('votes')->take(5)->keys();

            foreach ($top5 as $storyId) {
                $winner = new Winner();

                $winner->story_id = $storyId;
                $winner->save();
            }

            Vote::query()->truncate();

            $period->assignment_complete = 1;
            $period->save();
        }
    }
}