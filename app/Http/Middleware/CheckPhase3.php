<?php

namespace App\Http\Middleware;

use App\Repositories\SettingsRepository;
use Closure;

class CheckPhase3
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!env('TESTMODE')){
            $settingsRepository = app()->make(SettingsRepository::class);

            if ($settingsRepository->getCurrentPhase() != 3) {
                return response(abort(404));
            }
        }

        return $next($request);
    }
}
