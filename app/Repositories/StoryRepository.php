<?php

namespace App\Repositories;


use App\Story;
use App\User;
use App\Winner;

class StoryRepository
{

    public function getAll()
    {
        return Story::all();
    }

    public function getUserStory(User $user)
    {
        return Story::where('user_id', $user->id)->get()->first();
    }

    public function save(User $user, $data)
    {
        $story = $this->getUserStory($user);

        if (!$story) {
            $story = new Story();
        }

        $story->user_id = $user['id'];
        $story->race_id = $data['race'];
        $story->class_id = $data['class'];
        $story->sub_class_id = $data['subclass'][$data['class']];
        $story->background_id = $data['background'];
        $story->name = $data['name'];
        $story->age = $data['age'];
        $story->story = $data['backstory'];
        $story->ip_address = request()->ip();

        $story->save();
    }

    public function getTop5()
    {
        $storyIds = Winner::all()->pluck('story_id');

        return Story::whereIn('id', $storyIds)->get();
    }

    public function getTop1()
    {
        $votes = collect();
        $storyIds = Winner::all()->pluck('story_id');

        $stories = Story::whereIn('id', $storyIds)->get();

        foreach ($stories as $story) {
            $votes->put($story->id, ['votes' => $story->votes()->count()]);
        }

        $winnerStoryId = $votes->sortByDesc('votes')->keys()->first();

        return Story::find($winnerStoryId);
    }
}
