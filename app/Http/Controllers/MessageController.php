<?php

namespace App\Http\Controllers;

use App\Message;
use App\NewsLetter;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    
    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => ['required', 'string', 'email', 'max:255'],
            'subject' => 'required',
            'message' => 'required',
        ]);
        
        Message::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);
        
        $email = NewsLetter::where('email', $request->email)->get();
        if (count($email) == 0) {
            NewsLetter::create(['email'=>$request->email]);
        }
        
        $newsLetter = NewsLetter::create(['email'=>$request->email]);
        session()->flash('status', 'Your message have been saved');
        return redirect()->back();
    }
}
