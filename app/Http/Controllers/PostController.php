<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Exception;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class PostController extends Controller
{
    public function getAll()
    {
        $posts = Post::all();
        $categories = Category::all();
        return view("admin_panel.articles", ["posts" => $posts, "categories" => $categories]);
    }

    public function get($id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        return view("admin_panel.show_article", ["post" => $post, "categories" => $categories]);
    }

    public function create(Request $request)
    {
        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id = $request->category_id;
        $image = "";
        if ($request->hasFile('image')) {
            $filename = $request->file('image')->getClientOriginalName();
            try {
                $request->file('image')->move('storage/post_images', $filename);
                $image = $filename;
            } catch (Exception $th) {
                var_dump($th->getMessage());
                return back()->with('error', 'true');
            }
        }
        $post->image = $image;
        $post->save();
        return redirect()->back()->with("success", "true");
    }

    public function update($id, Request $request)
    {
        $post = Post::find($id);
        $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id = $request->category_id;
        if ($request->hasFile('image')) {
            $filename = $request->file('image')->getClientOriginalName();
            try {
                $request->file('image')->move('storage/post_images', $filename);
                $post->image = $filename;
            } catch (Exception $th) {
                var_dump($th->getMessage());
                return redirect()->back()->with('error', "true");
            }
        } else {
            $post->image = $request->old_image;
        }

        $post->update();
        return redirect()->back()->with("success", "true");
    }

    public function delete($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('admin_panel.articles')->with('info', "Post Deleted!");
    }
}
