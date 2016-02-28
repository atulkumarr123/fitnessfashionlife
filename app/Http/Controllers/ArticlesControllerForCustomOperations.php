<?php

namespace App\Http\Controllers;


use App\Article;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Http\Requests\ArticleRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ArticlesControllerForCustomOperations extends ArticlesController
{

    public function filterArticlesBasedOnCategory($category)
    {  DB::connection()->enableQueryLog();
        if(Auth::check()&&Auth::user()->roles()->lists('role')->contains('admin'))
        $articles = Article::where('category', $category)->orderBy('id', 'desc')->get();
        else
            $articles = Article::where('isPublishedByAdmin', 1)->where('category', $category)->orderBy('id', 'desc')->get();
        return view('viewContent.home')->with(compact('articles'));
    }

    public function search(ArticleRequest $request)
    {
//        $articles = DB::table('articles')
//->where('title', 'LIKE', '%' . $request->get('title') . '%')->paginate(10);
        $searchKey = $request->get('search');
        if(Auth::check()&&Auth::user()->roles()->lists('role')->contains('admin'))
            $articles = Article::where('title', 'LIKE', '%'.$searchKey.'%')->orderBy('id', 'desc')->get();
        else
            $articles = Article::where('isPublishedByAdmin', 1)->where('title', 'LIKE', '%'.$searchKey.'%')->orderBy('id', 'desc')->get();
        $queries = DB::getQueryLog();
        Log::info($queries);
        $search = $request->get('search');
        return view('viewContent.home')->with(compact('articles','search'));
    }

    }

