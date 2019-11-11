<?php

namespace App\Http\Middleware;

use Closure;

class Locale
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $raw_locale = $request->session()->get('locale');
        $raw_currency = $request->session()->get('currency');
        if(!$raw_currency) {
			\Session::put('currency', \Config::get('app.currency'));
		}
        
        if (in_array($raw_locale, \Config::get('app.locales'))) {
            $locale = $raw_locale;
        } else {
            $locale = \Config::get('app.locale');
			\Session::put('locale', $locale);
        }
        \App::setLocale($locale);
        return $next($request);
    }
}
