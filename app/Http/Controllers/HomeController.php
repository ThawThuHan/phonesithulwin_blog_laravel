<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $books = Book::all();
        $recentPosts = Post::latest()->paginate(9);
        $popularPosts = Post::orderBy('view_count', 'desc')->take(4)->get();;
        // dd($popularPosts);
        return view('home', [
            "books" => $books,
            "recentPosts" => $recentPosts,
            "popularPosts" => $popularPosts,
        ]);
    }

    public function post($id)
    {
        $post = Post::find($id);
        $recentPosts = Post::latest()->take(5)->get();
        $popular = Post::orderBy('view_count', 'desc')->take(5)->get();
        $relatedPosts = Post::where("category_id", $post->category_id)->take(3)->get();
        return view('post', [
            "current" => $post,
            "recentPosts" => $recentPosts,
            "popular" => $popular,
            "relatedPosts" => $relatedPosts,
        ]);
    }

    // categories page
    public function categories()
    {
        $categories = Category::all();
        return view("categories", [
            "categories" => $categories,
        ]);
    }

    public function postsByCategory($id)
    {
        $category = Category::find($id);
        $posts = $category->posts;
        return view("posts", [
            "category" => $category,
            "posts" => $posts,
        ]);
    }

    public function search(Request $request)
    {
        if (isset($_GET['query'])) {
            $search = $_GET['query'];
            $posts = Post::where('content', 'LIKE', '%' . $search . '%')->get();
            return view('search', [
                "search" => $search,
                "posts" => $posts,
            ]);
        }
        return back();
    }
}
