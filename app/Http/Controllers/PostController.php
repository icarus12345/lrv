<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Banner;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        \Session::put('categories', $request->categories);
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
		$categories = \Session::get('categories');
        $posts = Post::newest()
			->paginate(9);
        return view('blogs',[
            'categories'    => $tree,
           
            'posts'  => $posts,
        ]);
    }
	
	/**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function category(Request $request, $category_id)
    {
        $rows = Category::where('type', 'gid')->get();
        $tree = Category::buildNested($rows);
        $category = Category::findOrFail($category_id);
		$posts = Post::byCategory($category)
			->newest()
			->paginate(9);
        return view('blogs',[
            'categories'    => $tree,
            'category'    => $category,
            'posts'  => $posts,
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function archive(Request $request, $month)
    {
        $rows = Category::where('type', 'gid')->get();
        $tree = Category::buildNested($rows);
        $posts = Post::byArchive($month)
            ->newest()
            ->paginate(9);
        return view('blogs',[
            'categories'    => $tree,
            'posts'  => $posts,
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function detail(Request $request, $id)
    {
        $rows = Category::where('type', 'gid')->get();
        $tree = Category::buildNested($rows);
        $post = Post::findOrFail($id);
        return view('blog-detail',[
            'categories'    => $tree,
            'post'  => $post,
        ]);
    }
}
