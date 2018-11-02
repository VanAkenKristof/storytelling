<?php

namespace App\Http\Controllers;

use App\Http\Requests\BanRequest;
use App\Http\Requests\PhaseRequest;
use App\Repositories\SettingsRepository;
use App\Repositories\UserRepository;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * @var UserRepository
     */
    private $userRepository;
    /**
     * @var SettingsRepository
     */
    private $settingsRepository;

    /**
     * AdminController constructor.
     * @param UserRepository $userRepository
     * @param SettingsRepository $settingsRepository
     */
    public function __construct(UserRepository $userRepository, SettingsRepository $settingsRepository)
    {
        $this->userRepository = $userRepository;
        $this->settingsRepository = $settingsRepository;
    }

    public function users()
    {
        $users = $this->userRepository->getAll();

        return view('admin.users.list', compact('users'));
    }

    public function banUser(Request $request, User $user)
    {
        $this->userRepository->banUser($user, $request->message);

        return redirect(route('admin.users.list'));
    }

    public function unbanUser(User $user)
    {
        $this->userRepository->unbanUser($user);

        return redirect(route('admin.users.list'));
    }

    public function settings()
    {
        $phases = $this->settingsRepository->getPhases();
        $phaseCollection = collect();

        foreach ($phases as $phase) {
            $phaseCollection->put($phase->id, $this->formatPhase($phase));
        }

        return view('admin.settings.index', compact('phaseCollection'));
    }

    public function editSettings(PhaseRequest $request)
    {
        $this->settingsRepository->editPhases($request->all());

        return redirect(route('admin.settings.index'));
    }

    private function formatPhase($phase)
    {
        return Carbon::parse($phase->start)->format("d/m/Y") . " - " . Carbon::parse($phase->end)->format("d/m/Y");
    }
}
