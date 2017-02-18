<?php

namespace App\Http\Middleware;

use Closure;

class LangMiddleware
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
        $lang = \Cookie::get('lang', 'ru');

        if($request->has('lang')){
            $lang = $request->get('lang');

            return redirect()
                ->route($request->route()->getName())
                ->withCookie(cookie()->forever('lang', $lang));
        }

        app()->setLocale($lang);

        return $next($request);
    }
}
