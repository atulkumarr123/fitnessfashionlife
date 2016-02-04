<?php

namespace App\Http\Controllers;

use App\ArticleDetail;
use App\Http\Requests\ArticleRequest;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Article;
use App\Tag;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $articles = Article::all()->orderBy('counter', 'asc');
        $articles = Article::orderBy('id','desc')->get();
//        Log::info("Here we go ".$articles);
//        dd($articles);
        return view('viewContent.home')->with('articles', $articles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        dd("create");
//        return view('newarticle');
        $tags = Tag::lists('name','id');
        $selectedTags = emptyArray();
        return view('createContent.newarticle')->with(compact('tags','selectedTags'));
//                                    ->with('selectedTags');
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
            $article = Article::create(['title' => $request->get('title'),
                'description' => $request->get('description')]);

            $tagsFromRequest = $request->input('tags');
            Log::info("hereeee");
            Log::info($tagsFromRequest);
            for ($counter = 0; $counter < count($tagsFromRequest); $counter++) {
                if (!Tag::lists('id')->contains($tagsFromRequest[$counter])) {
                    $tag = Tag::create(['name' => $tagsFromRequest[$counter]]);
                    $tag->save();
                    $tagsFromRequest[$counter] = $tag->id;
                }
            }
            $article->tags()->sync($tagsFromRequest);

            $numberOfTextAreas =  $request->get('numberOfTextAreas');
            $collectionOfDetails = new Collection();
//            dd($numberOfTextAreas);
            for ($counter = 0; $counter < $numberOfTextAreas; $counter++){
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
        Log::info("show($id)");
        $article = Article::findorFail($id);
        $tags = Tag::lists('name','id');
        $selectedTags = $article->tags()->lists('name');
        $articleDetails = ArticleDetail::where('article_id', $id)->orderBy('counter', 'asc')->paginate(1);
        return view('viewContent.carouselModeToListArticles')->with(compact('articleDetails','selectedTags'));
//        $articleDetails = ArticleDetail::where('article_id', $id)->orderBy('counter', 'asc')->get();
//        return view('articleWithCkEdReadOnly')->with('articleDetails', $articleDetails);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
//        Log::info("edit($id)");
//        $tags = Tag::lists('name','id');
//        return view('newarticle')->with(compact('tags'));
        $article = Article::findorFail($id);
        $articleDetails = ArticleDetail::where('article_id', $id)->orderBy('counter', 'asc')->get();
        $title = $articleDetails->get(0)->article->title;
        $tags = Tag::lists('name','id');
        $selectedTags = $article->tags()->lists('id')->toArray();
        $description = $articleDetails->get(0)->article->description;
        return view('editUpdateContent.editArticle')->
            with(compact('articleDetails', 'title','description','selectedTags','tags'));
//            ->with('selectedTags',$selectedTags->toArray());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, $id)
    {
//        Log::info("fffff".$request->get('articleBody6'));
//        dd($request);
//        Log::info("update(ArticleRequest $request, $id)");
        DB::beginTransaction();
        try {
            $article = Article::findorFail($id);
            $article->title = $request->get('title');
            $article->description = $request->get('description');

            $tagsFromRequest = $request->input('tags');
            Log::info("hereeee");
            Log::info($tagsFromRequest);
            for ($counter = 0; $counter < count($tagsFromRequest); $counter++) {
                if (!Tag::lists('id')->contains($tagsFromRequest[$counter])) {
                    $tag = Tag::create(['name' => $tagsFromRequest[$counter]]);
                    $tag->save();
                    $tagsFromRequest[$counter] = $tag->id;
                }
            }
            $article->tags()->sync($tagsFromRequest);
//            $article->update();

            $numberOfTextAreas =  $request->get('numberOfTextAreas');
//            Log::info("static 5...".$request->get('articleBody4'));
//            Log::info("static 6...".$request->get('articleBody6'));
            for ($counter = 0; $counter < $numberOfTextAreas; $counter++){
//                Log::info("fffff".$request->get('articleBody'.$counter));
                $imageName = $this->get_string_between($request->get('articleBody'.$counter), 'src="/images/', '"');
                 $articleDetailId = null;
                 $articleDetail = new ArticleDetail();
                if(count($request->get('articleDetailId'))>$counter){
                    $articleDetailId = $request->get('articleDetailId')[$counter];
                    $articleDetail = ArticleDetail::find($articleDetailId);
                }
                Log::info("dynamic".$counter."...".$request->get('articleBody'.$counter));
                $articleDetail->body = $request->get('articleBody'.$counter);
                $articleDetail->id = $articleDetailId;
                $articleDetail->img_name = $imageName;
                $articleDetail->counter = $counter;
//                Log::info("hiiiiiiiii".$articleDetail->id);


                if($articleDetail->id){
//                    Log::info("if");
                    $articleDetail->article()->associate($article);
                    $articleDetail->update();
                }
                else{
//                    Log::info("else");
                    $articleDetail->article()->associate($article);
                    $articleDetail->save();
                }
            }
            DB::commit();
        } catch (\Exception $e) {
            Log::info("error....");
            DB::rollback();
            throw $e;
        }
        return redirect('/articles');
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
