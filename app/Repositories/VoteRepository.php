<?php

namespace App\Repositories;


use App\Story;
use App\User;
use App\Vote;

class VoteRepository
{
    public function saveVote(Story $story, User $user)
    {
        $vote = new Vote();
        $vote->user_id = $user->id;
        $vote->story_id = $story->id;
        $vote->save();
    }

    public function deleteVote(Story $story, User $user)
    {
        $voteId = $this->findVoteByStoryAndUser($story, $user);

        $vote = Vote::find($voteId);
        $vote->delete();
    }

    public function getVotesFromUser(User $user)
    {
        return $user->votes();
    }

    public function findVoteByStoryAndUser(Story $story, User $user)
    {
        $vote = Vote::where('story_id', $story->id)->where('user_id', $user->id)->first();

        if ($vote) {
            return $vote->id;
        }

        return false;
    }

    public function getAmountVoted(Story $story)
    {
        return Vote::where('story_id', $story->id)->count();
    }
}