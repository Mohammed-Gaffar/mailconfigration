<?php

namespace App\Http\Controllers;

use App\Mail\sendingEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    //
    function index()
    {
        return view('emailsend');
    }

    function send(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        $data = array(
            'name' => $request->name,
            'message' => $request->message
        );

        Mail::to('mohammedaidaab@gmail.com')->send(new sendingEmail($data));
        return back()->with('success', 'Thanks for contacting us!');
    }
}
