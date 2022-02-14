<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function getAll()
    {
        $books = Book::all();
        return view("admin_panel.books", ["books" => $books]);
    }

    public function get($id)
    {
        $book = Book::find($id);
        return view("admin_panel.show_book", ["book" => $book]);
    }

    public function create(Request $request)
    {
        $book = new Book();
        $book->name = $request->title;
        $book->price = $request->price;
        $book->features = $request->features;
        $book->release_date = $request->release_date;
        $book->preview_content = $request->preview_content;
        $book->available = $request->available;
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $filename = $file->getClientOriginalName();
                $file->move('storage/book_images', $filename);
                $data[] = $filename;
            }
        } else {
            return back()->with("error", "Something Wrong!");
        }
        $book->images = json_encode($data);
        $book->save();
        return back()->with("success", "New Book Added!");
    }

    public function update($id, Request $request)
    {
        $book = Book::find($id);
        $book->name = $request->title;
        $book->price = $request->price;
        $book->features = $request->features;
        $book->release_date = $request->release_date;
        $book->preview_content = $request->preview_content;
        $book->available = $request->available;
        $book->images = $request->old_images;
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $filename = $file->getClientOriginalName();
                $file->move('storage/book_images', $filename);
                $data[] = $filename;
            }
            $book->images = json_encode($data);
        }
        $book->update();
        return back()->with("success", "Updated Successful!");
    }

    public function delete($id)
    {
        $book = Book::find($id);
        $book->delete();
        return redirect()->route('admin_panel.books')->with('info', "Book Deleted!");
    }
}
