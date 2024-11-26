<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact.Contact',[
            'title' => 'Liên hệ'

        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'msg' => 'required'
        ]);

        Contact::create([
            'email' => $request->email,
            'message' => $request->msg
        ]);

        return redirect()->route('contact')->with('success', 'Your message has been sent successfully!');
    }
}
