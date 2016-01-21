<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
class PagesController extends Controller
{
    public function about()
    {
        return view('article');
    }

    public function home()
    { Log::info("First line");
        $articles = Article::all();
//        dd($articles);
        return view('home')->with('articles', $articles);
    }
}
