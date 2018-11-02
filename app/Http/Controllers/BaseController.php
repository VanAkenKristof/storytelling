<?php

namespace App\Http\Controllers;

use App\Repositories\SettingsRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class BaseController extends Controller
{

    /**
     * BaseController constructor.
     */
    public function __construct()
    {
        $currentPhase = null;

        $settingsRepository = app()->make(SettingsRepository::class);
        $currentPhase = $settingsRepository->getCurrentPhase();

        View::share('currentPhase', $currentPhase);
    }
}
