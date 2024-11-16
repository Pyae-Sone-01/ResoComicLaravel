<?php

namespace App\Http\Middleware;

use App;
use Closure;
use Illuminate\Http\Request;

class Localizer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $locale = 'tc';

        if (session('locale') && auth()->user()->email == 'laraadmin@laravel.com') {
            // this will come from frontend localization localesMapping rules and default locale session
            if (in_array(session('locale'), ['en', 'tc'])) { # initial locale with frontend localization
                $locale = [
                    'en' => 'en',
                    'tc' => 'tc',
                ][session('locale')];

                App::setLocale($locale);

            } else { # backend loclization change
                App::setLocale(session('locale'));
            }
        } else {
            App::setLocale($locale);
        }
        return $next($request);
    }
}
