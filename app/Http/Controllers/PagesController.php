<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests;
use Illuminate\Support\Facades\Log;

class PagesController extends Controller
{

    public function about()
    {
        return view('miscellaneous.about');
    }
    public function talkToUs()
    {
        return view('miscellaneous.talkToUs');
    }
    public function policy()
    {
        return view('miscellaneous.policy');
    }
    public function termsConditions()
    {
        return view('miscellaneous.termsConditions');
    }

    public function home()
    { Log::info("First line");
        $articles = Article::all();
//        dd($articles);
        return view('home')->with('articles', $articles);
    }

}
