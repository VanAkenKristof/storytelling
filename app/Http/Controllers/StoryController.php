<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoryRequest;
use App\Repositories\BackgroundRepository;
use App\Repositories\ClassRepository;
use App\Repositories\RaceRepository;
use App\Repositories\SettingsRepository;
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
    /**
     * @var RaceRepository
     */
    private $raceRepository;
    /**
     * @var ClassRepository
     */
    private $classRepository;
    /**
     * @var BackgroundRepository
     */
    private $backgroundRepository;
    /**
     * @var SettingsRepository
     */
    private $settingsRepository;

    /**
     * StoryController constructor.
     * @param StoryRepository $storyRepository
     * @param VoteRepository $voteRepository
     * @param RaceRepository $raceRepository
     * @param ClassRepository $classRepository
     * @param BackgroundRepository $backgroundRepository
     * @param SettingsRepository $settingsRepository
     */
    public function __construct(
        StoryRepository $storyRepository,
        VoteRepository $voteRepository,
        RaceRepository $raceRepository,
        ClassRepository $classRepository,
        BackgroundRepository $backgroundRepository,
        SettingsRepository $settingsRepository)
    {
        $this->storyRepository = $storyRepository;
        $this->voteRepository = $voteRepository;
        $this->raceRepository = $raceRepository;
        $this->classRepository = $classRepository;
        $this->backgroundRepository = $backgroundRepository;
        $this->settingsRepository = $settingsRepository;
    }

    public function index()
    {
        $title = 'Storytelling | Demystified';
        $subTitle = "Storytelling demystified!";

        $phases = $this->settingsRepository->getFormattedPhases();

        return view('storytelling.index', compact('title', 'subTitle', 'phases'));
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

    public function create()
    {
        $title = 'Storytelling | List';
        $subTitle = 'Create Story';

        $user = Auth::user();

        if (!$user) {
            return redirect(route('login'));
        }

        $story = $this->storyRepository->getUserStory($user);

        if ($story) {
            return redirect(route('storytelling.edit', compact('story')));
        }

        $races = $this->raceRepository->getAll();
        $classes = $this->classRepository->getAll();
        $backgrounds = $this->backgroundRepository->getAll();

        return view ('storytelling.create', compact('title', 'subTitle', 'races', 'classes', 'backgrounds'));
    }

    public function save(StoryRequest $request)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect(route('login'));
        }

        $this->storyRepository->save($user, $request->all());

        return redirect(route('storytelling.list'));
    }

    public function edit(Story $story)
    {
        $title = 'Storytelling | List';
        $subTitle = 'Edit Story';

        if (!Auth::user()) {
            return redirect(route('login'));
        }

        $races = $this->raceRepository->getAll();
        $classes = $this->classRepository->getAll();
        $backgrounds = $this->backgroundRepository->getAll();

        return view ('storytelling.create', compact('title', 'subTitle', 'races', 'classes', 'backgrounds', 'story'));
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
