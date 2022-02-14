<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function getAll($id = "")
    {
        $category = "";
        if ($id) {
            $category = Category::find($id);
        }
        $data = Category::all();
        return view('admin_panel.categories', ["categories" => $data, "category" => $category,]);
    }

    public function getPostByCategory($id)
    {
        $category = Category::find($id);
        $posts = $category->posts;
        return view('admin_panel.articles', ["posts" => $posts, "category" => $category]);
    }

    public function create(Request $request)
    {
        $validate = $request->validate([
            "category_name" => "required",
            "image" => "required",
        ]);

        if ($validate) {
            $category = new Category();
            $category->name = $request->category_name;
            if ($request->hasFile("image")) {
                $filename = $request->file('image')->getClientOriginalName();
                $request->file('image')->move("storage/category_images", $filename);
                $category->image = $filename;
            } else {
                return redirect()->back()->with('error', 'something wrong!');
            }
            $category->save();
            return redirect()->route('admin_panel');
        } else {
            return redirect()->route('admin_panel')->withErrors($validate);
        }
    }

    public function update($id, Request $request)
    {
        $validate = $request->validate([
            "category_name" => 'required',
        ]);
        if ($validate) {
            $category = Category::find($id);
            $category->name = $request->category_name;
            if ($request->hasFile("image")) {
                $filename = $request->file('image')->getClientOriginalName();
                $request->file('image')->move("storage/category_images", $filename);
                $category->image = $filename;
            }
            $result = $category->update();
            if ($result) {
                return redirect()->route('admin_panel');
            } else {
                return back()->with('error');
            }
        } else {
            return back()->with('error');
        }
    }

    public function delete($id)
    {
        $category = Category::find($id);
        $category->delete();
        return back();
    }
}
