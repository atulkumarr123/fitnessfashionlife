<?php

namespace App\Http\Controllers;

use App\ArticleDetail;
use App\Http\Requests\ArticleRequest;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Article;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all();
//        Log::info("Here we go ".$articles->get(0)->articleDetails->get(0)->img_name);
//        dd($articles);
        return view('home')->with('articles', $articles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        return view('createArticleDetail');
        return view('newarticle');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        DB::beginTransaction();
        try {

            $article = new Article(['title' => $request->get('title'),
                'description' => $request->get('description')]);
            $article->save();
            $numberOfTextAreas =  $request->get('numberOfTextAreas');
            $collectionOfDetails = new Collection();
//            dd($numberOfTextAreas);
            for ($counter = 1; $counter <= $numberOfTextAreas; $counter++){
                $imageName = $this->get_string_between($request->get('articleBody'.$counter), 'src="/images/', '"');
//            $articleDetails = new ArticleDetail(['body' => $request->get('articleBody'.$counter),
//                'img_name' => $imageName]);
//                $collectionOfDetails->push($articleDetails);
//                Log::info("".$counter);
                $collectionOfDetails->push(
                    new ArticleDetail([
                        'body'      => $request->get('articleBody'.$counter),
                        'img_name'      => $imageName,
                        'counter'      => $counter
                    ])
                );

        }
//            dd($counter);
            $article->articleDetails()->saveMany($collectionOfDetails);
            DB::commit();
        } catch (\Exception $e) {
            Log::info("error....");
            DB::rollback();
            throw $e;
        }
        return redirect('/articles');
    }

public function get_string_between($string, $start, $end){
        $string = ' ' . $string;
        $ini = strpos($string, $start);
        if ($ini == 0) return '';
        $ini += strlen($start);
        $len = strpos($string, $end, $ini) - $ini;
        return substr($string, $ini, $len);
    }
    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $articleDetails = ArticleDetail::where('article_id', $id)->orderBy('counter', 'asc')->get();
        return view('articleWithCkEdReadOnly')->with('articleDetails', $articleDetails);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $articleDetails = ArticleDetail::where('article_id', $id)->orderBy('counter', 'asc')->get();
        return view('editArticle')->with('articleDetails', $articleDetails);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
