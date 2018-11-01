<?php

namespace App\Http\Controllers;

use App\Http\Requests\BanRequest;
use App\Repositories\UserRepository;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * AdminController constructor.
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
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

    }
}
