<?php

namespace App\Http\Controllers;

use App\Repositories\StoryRepository;
use Illuminate\Http\Request;

class StoryController extends Controller
{
    /**
     * @var StoryRepository
     */
    private $storyRepository;

    public function __construct(StoryRepository $storyRepository)
    {
        $this->storyRepository = $storyRepository;
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

        return view ('storytelling.list', compact('title', 'subTitle', 'stories'));
    }
}
