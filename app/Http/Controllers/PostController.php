<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Exception;
use Illuminate\Http\Request;

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
        // $previous_route = url()->previous();
        // dd($previous_route);
        $previous_route = app('router')->getRoutes()->match(app('request')->create(url()->previous()))->getName();
        return view(
            "admin_panel.show_article",
            [
                "post" => $post,
                "categories" => $categories,
                "previous_route" => $previous_route
            ]
        );
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

    public function delete($id, Request $request)
    {
        // dd($request->previous_route);
        $post = Post::find($id);
        $previous_route = $request->previous_route;
        // $post->delete();
        // return redirect()->back()->with('info', "Post Deleted!");
        if ($previous_route == "admin_panel.articles") {
            return redirect()->route('admin_panel.articles')->with('info', "Post Deleted!");
        } else {
            // return redirect("/admin-panel/categories/$post->category_id/articles")->with('info', "Post Deleted!");
            return redirect()->route('admin_panel.category.articles', ['id' => $post->category_id])->with('info', "Post Deleted!");
        }
    }
}
