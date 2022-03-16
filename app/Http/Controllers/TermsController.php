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
    
    public function rule(){
        return view('terms.rule',[
           'title' => '利用規約',
        ]);
    }
    
}
