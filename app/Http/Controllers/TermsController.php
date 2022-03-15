<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TermsController extends Controller
{
    public function guide(){
        return view('terms.guide',[
           'title' => 'このサイトについて',
        ]);
    }
    
    
}
