<?php

namespace App\Http\Controllers;


use App\Article;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ArticlesControllerForCustomOperations extends ArticlesController
{

    public function filterArticlesBasedOnCategory($category)
    {  DB::connection()->enableQueryLog();
        $articles = Article::where('category', $category)->orderBy('id', 'asc')->get();
        $queries = DB::getQueryLog();
        Log::info($queries);
        return view('viewContent.home')->with(compact('articles'));
    }

    }

