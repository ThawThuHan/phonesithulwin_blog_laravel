<?php

namespace App\Http\Controllers;

use App\Mail\OrderConfimMail;
use App\Models\Book;
use App\Models\Order;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function index($id)
    {
        $book = Book::find($id);
        return view('book_order', ['book' => $book]);
    }

    public function create(Request $request)
    {
        $validate = $request->validate([
            "name" => "required",
            "email" => "required",
            "phone" => "required",
            "address" => "required",
            "book_id" => "required",
            "payment_screenshot" => "required",
        ]);

        if (!$validate) return redirect()->withErrors($validate);

        $order = new Order();
        $order->name = $request->name;
        $order->email = $request->email;
        $order->phone = $request->phone;
        $order->address = $request->address;
        $order->book_id = $request->book_id;
        if ($request->hasFile('payment_screenshot')) {
            $filename = $request->file('payment_screenshot')->getClientOriginalName();
            try {
                $request->file('payment_screenshot')->move('storage/payment_screenshot', $filename);
                $order->payment_screenshot = $filename;
            } catch (Exception $th) {
                dd($th);
                return redirect()->back()->with('error', "Order uncomplete! Re-order now.");
            }
        } else {
            return redirect()->back()->with('error', 'Order uncomplete! Re-order now.');
        }

        $order->save();
        return redirect()->back()->with('success', "Complete Order Successful, We'll reply back soon!");
    }

    public function getAll()
    {
        $orders = Order::all();
        return view('admin_panel.orders', ["orders" => $orders]);
    }

    public function confirm($id)
    {
        $order = Order::find($id);
        $details = [
            "title" => "Order Confirmed!",
            "message" => "Hey $order->name, We've got your order! We'll send your order from delievery. Thanks for supporting me.",
        ];
        try {
            Mail::to("$order->email")->send(new OrderConfimMail($details));
            $order->confirm = true;
            $order->update();
        } catch (Exception $e) {
            return back()->with('error', 'something Wrong!');
        }
        return back()->with('success', "Order confirm Mail Send!");
    }

    public function cancel($id, Request $request)
    {
        $validator = $request->validate([
            "message" => "required",
        ]);
        if (!$validator) {
            return back()->with('error', 'something wrong!');
        }
        $details = [
            "title" => "Order Canceled!",
            "message" => $request->message,
        ];
        $order = Order::find($id);
        try {
            Mail::to("$order->email")->send(new OrderConfimMail($details));
            $order->confirm = false;
            $order->update();
        } catch (Exception $e) {
            return back()->with('error', 'something Wrong!');
        }
        return back()->with('success', "Order cancel Mail Send!");
    }
}
