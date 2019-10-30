<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
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
		$rows = Category::where('type', 'gid')->get();
		$tree = Category::buildNested($rows);
        return view('home',[
			'categories'	=> $tree
		]);
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
