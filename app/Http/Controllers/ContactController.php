<?php

namespace App\Http\Controllers;

use App\Mail\FeedbackMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $details = [
            "name" => $request->yname,
            "email" => $request->email,
            "phone" => $request->phone,
            "messages" => $request->messages,
        ];
        try {
            Mail::to("support@phonesithulwin.info")->send(new FeedbackMail($details));
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return back()->with("error", "feedback sending fail! please try again...");
        }
        return back()->with("success", "Email send success! thanks.");
    }
}
