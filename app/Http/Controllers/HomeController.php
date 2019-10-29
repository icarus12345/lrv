<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function demo()
    {
        return view('home');
    }
	
	public function locale(string $locale)
    {
        if (!in_array($locale, \Config::get('app.locales'))) {
            // Set default locale;
            $locale = \Config::get('app.locale');
        }

        \Session::put('locale', $locale);

        return redirect()->back();
    }
}
