<?php

namespace App\Http\Controllers;


use App\Article;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Http\Requests\SearchRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ArticlesControllerForCustomOperations extends ArticlesController
{

    public function filterArticlesBasedOnCategory($category)
    {  DB::connection()->enableQueryLog();
        if(Auth::check()&&Auth::user()->roles()->lists('role')->contains('admin'))
        $articles = Article::where('category_id', $category)->orderBy('updated_at', 'desc')->get();
        else if(Auth::check()&&!(Auth::user()->roles()->lists('role')->contains('admin'))){
            $articlesPublishedByAdminAndDoesntBelongToCurrentUser = Article::where('isPublishedByAdmin', 1)->
            where('user_id', '!=',Auth::user()->id)->
            where('category_id', $category)->orderBy('updated_at', 'desc')->get();
            $queries = DB::getQueryLog();
            $articles = Auth::user()->articles()->get();
            $articles = $articles->merge($articlesPublishedByAdminAndDoesntBelongToCurrentUser);
        }
        else
            $articles = Article::where('isPublishedByAdmin', 1)->where('category_id', $category)->orderBy('updated_at', 'desc')->get();
        return view('viewContent.home')->with(compact('articles'));
    }

    public function search(SearchRequest $request)
    {
        Log::info("HIIII");
        $searchKey = $request->get('search');

        if(Auth::check()&&Auth::user()->roles()->lists('role')->contains('admin'))
            $articles = Article::where('title', 'LIKE', '%'.$searchKey.'%')->orderBy('updated_at', 'desc')->get();
        else if(Auth::check()&&!(Auth::user()->roles()->lists('role')->contains('admin'))){
            $articlesPublishedByAdminAndDoesntBelongToCurrentUser = Article::where('isPublishedByAdmin', 1)->
            where('title', 'LIKE', '%'.$searchKey.'%')->orderBy('updated_at', 'desc')->get();
            $queries = DB::getQueryLog();
            $articles = Auth::user()->articles()->get();
            $articles = $articles->merge($articlesPublishedByAdminAndDoesntBelongToCurrentUser);
        }
        else
            $articles = Article::where('isPublishedByAdmin', 1)->where('title', 'LIKE', '%'.$searchKey.'%')->orderBy('updated_at', 'desc')->get();
        $queries = DB::getQueryLog();
        Log::info($queries);
        $search = $request->get('search');
        return view('viewContent.home')->with(compact('articles','search'));
    }

    }

