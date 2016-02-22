<?php

namespace App\Http\Controllers;


use App\Article;
use App\Http\Requests;
use App\Http\Requests\ArticleRequest;
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

    public function search(ArticleRequest $request)
    {
//        $articles = DB::table('articles')
//->where('title', 'LIKE', '%' . $request->get('title') . '%')->paginate(10);
        $title = $request->get('search');
        DB::connection()->enableQueryLog();
        $articles = collect(DB::select("select articles.* from articles where title like '%$title%' and
            articles.isPublishedByAdmin=1"));
        $queries = DB::getQueryLog();
        Log::info($queries);
//        dd(Carbon::parse($articles->get(0)->updated_at)->toFormattedDateString());

        $search = $request->get('search');
        return view('viewContent.home')->with(compact('articles','search'));
    }

    }

