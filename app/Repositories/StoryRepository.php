<?php

namespace App\Repositories;


use App\Story;
use App\User;

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
        $story = new Story();

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
}
