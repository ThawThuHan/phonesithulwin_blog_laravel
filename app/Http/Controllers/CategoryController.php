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
        return view('admin_panel.admin_panel', ["categories" => $data, "category" => $category,]);
    }

    public function create(Request $request)
    {
        $validate = $request->validate([
            "category_name" => "required",
        ]);

        if ($validate) {
            $category = new Category();
            $category->name = $request->category_name;
            $category->save();
            return redirect()->route('admin-panel');
        } else {
            return redirect()->route('admin-panel')->with('error');
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
            $result = $category->update();
            if ($result) {
                return redirect()->route('admin-panel');
            } else {
                return redirect()->route('admin-panel')->with('error');
            }
        } else {
            return redirect()->route('admin-panel')->with('error');
        }
    }

    public function delete($id)
    {
        $category = Category::find($id);
        $category->delete();
        return back();
    }
}
