<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                @if(Auth::user())
                    <div class="dropdown profile-element"> <span>
                             </span>
                        <a href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">{{ Auth::user()->name }}</strong>
                                    </span>
                                @if (Auth::user()->admin)
                                    <span class="text-muted text-xs block">Administrator</span> </span>
                            @endif
                        </a>
                    </div>
                @else
                    <div class="dropdown profile-element"> <span>
                             </span>
                        <a href="{{ route('login') }}">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">Login</strong>
                             </span> <span class="text-muted text-xs block">Storytelling</span> </span> </a>
                    </div>
                @endif
            </li>

            <li>
                <a href="{{ route('storytelling.index') }}"><i class="fa fa-fire"></i> <span class="nav-label">Storytelling</span></a>
            </li>

            @if (($currentPhase == 1 && (Auth::User() && !Auth::User()->admin)) || env('TESTMODE'))
            <li>
                <a href="{{ route('storytelling.create') }}"><i class="fa fa-pencil"></i> <span class="nav-label">Your story</span></a>
            </li>
            @endif

            @if ($currentPhase == 2 && (Auth::User() && !Auth::User()->admin) || env('TESTMODE'))
            <li>
                <a href="{{ route('storytelling.list') }}"><i class="fa fa-book"></i> <span class="nav-label">Read stories</span></a>
            </li>
            @endif

            @if($currentPhase == 3 || (Auth::User() && Auth::User()->admin) || env('TESTMODE'))
                <li>
                    <a href="{{ route('storytelling.rankings') }}"><i class="fa fa-list-ol"></i> <span class="nav-label">Story Rankings</span></a>
                </li>
            @endif

            @if($currentPhase == 4 || env('TESTMODE'))
                <li>
                    <a href="{{ route('storytelling.winner') }}"><i class="fa fa-trophy"></i> <span class="nav-label">Story Winner</span></a>
                </li>
            @endif

            @if (Auth::user() && Auth::User()->admin)
                <li>
                    <a href="{{ route('admin.users.list') }}"><i class="fa fa-user"></i> <span class="nav-label">Users</span></a>
                </li>
                <li>
                    <a href="{{ route('admin.settings.index') }}"><i class="fa fa-cogs"></i> <span class="nav-label">Settings</span></a>
                </li>
            @endif
        </ul>

    </div>
</nav>
