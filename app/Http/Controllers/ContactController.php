<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function send(Request $request)
    {
        $request->validate([
            'nom' => 'required|string',
            'email' => 'required|email',
            'message' => 'required|string|min:10',
        ]);

         Mail::to('anjara.solofondraibe@gmail.com')->send(new ContactMail($request->all()));

        return back()->with('success', 'Merci pour votre message ! Nous vous répondrons bientôt.');
    }
}
