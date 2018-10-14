<?php

namespace App\Http\Controllers;

use App\Repositories\StoryRepository;
use App\Repositories\VoteRepository;
use App\Story;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoryController extends Controller
{
    /**
     * @var StoryRepository
     */
    private $storyRepository;
    /**
     * @var VoteRepository
     */
    private $voteRepository;

    public function __construct(StoryRepository $storyRepository, VoteRepository $voteRepository)
    {
        $this->storyRepository = $storyRepository;
        $this->voteRepository = $voteRepository;
    }

    public function index()
    {
        $title = 'Storytelling | Demystified';
        $subTitle = "Storytelling demystified!";

        return view('storytelling.index', compact('title', 'subTitle'));
    }

    public function list()
    {
        $title = 'Storytelling | List';
        $subTitle = 'Stories';

        $stories = $this->storyRepository->getAll();

        if (Auth::user()) {
            $votes = $this->voteRepository->getVotesFromUser(Auth::user())->pluck('story_id');
        }

        return view ('storytelling.list', compact('title', 'subTitle', 'stories', 'votes'));
    }

    public function view(Story $story)
    {
        $title = 'Storytelling | List';
        $subTitle = 'Stories';

        if (Auth::user()) {
            $voted = $this->voteRepository->findVoteByStoryAndUser($story, Auth::user());
        }

        $votes = $this->voteRepository->getAmountVoted($story);

        return view ('storytelling.view', compact('title', 'subTitle', 'story', 'voted', 'votes'));
    }

    public function vote(Story $story)
    {
        $this->voteRepository->saveVote($story, Auth::user());

        return redirect()->back();
    }

    public function unvote(Story $story)
    {
        $this->voteRepository->deleteVote($story, Auth::user());

        return redirect()->back();
    }
}
