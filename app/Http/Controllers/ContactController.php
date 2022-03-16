<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;

use App\Contact;

class ContactController extends Controller
{
    public function create(){
        return view('contacts.create',[
            'title' => 'お問い合わせ',
        ]);
    }
    
    public function store(ContactRequest $request)
    {
        Contact::create([
          'name' => $request->name,
          'email' => $request->email,
          'message' => $request->message,
        ]);
        session()->flash('success', 'お問い合わせが完了しました。');
        return redirect()->route('contacts.create');
    }
}
