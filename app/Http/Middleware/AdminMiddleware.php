<?php

namespace App\Http\Middleware;

use Closure;
use Log;

class AdminMiddleware
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
        if(auth()->guest() || $request->user()->email != 'neo1@gmail1.com'){
            $str = 'Кто пытался получить к сайту' . $request->ip();

            if(auth()->check()){
                $str .= ' ' . auth()->user()->email;
            }

            Log::useDailyFiles(storage_path().'/logs/access.log', 10);
            Log::info($str);
            abort(403);
        }

        return $next($request);
    }
}
