<?php

namespace App\Http\Controllers;

use App\Article;
use App\ArticleDetail;
use App\Http\Requests;
use App\Http\Requests\ArticleRequest;
use App\Tag;
use App\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
//use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use Laracasts\Flash\Flash;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        Session::forget('isSubscribed');
        if(Auth::check()&&Auth::user()->roles()->lists('role')->contains('admin'))
        $articles = Article::orderBy('updated_at','desc')->get();
        else if(Auth::check()&&!(Auth::user()->roles()->lists('role')->contains('admin'))){
            DB::connection()->enableQueryLog();
            $articlesPublishedByAdminAndDoesntBelongToCurrentUser = Article::where('isPublishedByAdmin', 1)->
            where('user_id', '!=',Auth::user()->id)->orderBy('updated_at', 'desc')->get();
            $queries = DB::getQueryLog();
            $articles = Auth::user()->articles()->get();
            $articles = $articles->merge($articlesPublishedByAdminAndDoesntBelongToCurrentUser);
//            dd($articles);

        }
            else
        $articles = Article::where('isPublishedByAdmin', 1)->orderBy('updated_at', 'desc')->get();
        return view('viewContent.home')->with('articles', $articles);
//        return view('miscellaneous.subscribeForm')->with('articles', $articles);
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
//dd(Auth::user());
        DB::beginTransaction();
        try {
            $article = Article::create(['title' => $request->get('title'),
                'description' => $request->get('description'),
                'body' => $request->get('articleBody0'),
                'img_name' => $this->get_string_between($request->get('articleBody0'), 'src="/images/', '"'),
                'user_id' => Auth::user()->id]);

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
//            dd($article);
            $article->articleDetails()->saveMany($collectionOfDetails);
            DB::commit();
            if((!(Auth::check()&&Auth::user()->roles()->lists('role')->contains('admin'))
                &&($request->get('isPublished')=='on'))) {
                Flash::overlay('congratulations! your Article has been sent to Verification Department, It will be live sooner');
            }
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

//    public  function sampling($chars, $size, $combinations = array()) {
//        # if it's the first iteration, the first set
//        # of combinations is the same as the set of characters
//        if (empty($combinations)) {
//            $combinations = $chars;
//        }
//
//        # we're done if we're at size 1
//        if ($size == 1) {
//            return $combinations;
//        }
//
//        # initialise array to put new values in
//        $new_combinations = array();
//
//        # loop through existing combinations and character set to create strings
//        foreach ($combinations as $combination) {
//            foreach ($chars as $char) {
//                $new_combinations[] = $combination . $char;
//            }
//        }
//
//        # call same function again for the next iteration
//        return $this->sampling($chars, $size - 1, $new_combinations);
//
//    }
    function pc_array_power_set($array) {
        // initialize by adding the empty set
        $results = array(array( ));

        foreach ($array as $element)
            foreach ($results as $combination)
                array_push($results, array_merge(array($element), $combination));

        return $results;
    }
    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::findorFail($id);
        $tags = Tag::lists('name','id');
        $selectedTags = $article->tags()->lists('name');
        $numberOfTagsInCurrentArticle = count($selectedTags);
        DB::connection()->enableQueryLog();
        $similarArticles = array();
        if(!$selectedTags->isEmpty()) {
//            $reducingArrayOfTags = $selectedTags;
            $removedBrackets = substr($selectedTags, 1, -1);
            $numberOfIds = count($selectedTags);
            for ($counter = 0; $counter < $numberOfTagsInCurrentArticle ; $counter++) {

                $similarArticlesSubSet = DB::select
                (
                    'select articles.* from
            `articles`, tags,article_tag where
            article_tag.article_id = articles.id and
            article_tag.tag_id = tags.id and
            tags.name Not In (select name from tags where name NOT IN (' . $removedBrackets . ')) and
            articles.id<>' . $id . ' and
            articles.isPublishedByAdmin=1
            group by articles.id
            HAVING count(articles.id)='.$numberOfIds.'');
                $numberOfIds = $numberOfIds-1;
                if(count($similarArticlesSubSet)>0){
                    array_push($similarArticles,$similarArticlesSubSet);
                }
                $queries = DB::getQueryLog();
            }
            Log::info($queries);
//            Log::info($similarArticles);
        }
else{
    $similarArticles = emptyArray();
}
        $userOfThisArticle = User::where('id', $article->user_id)->get()->first();
//        $articleDetails = ArticleDetail::where('article_id', $id)->orderBy('counter', 'asc')->paginate(1);
//        return view('viewContent.carouselModeToListArticles')->with(compact('articleDetails','selectedTags'));
        return view('viewContent.article')->with(compact('article','selectedTags','similarArticles','userOfThisArticle'));
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
//        dd($articleDetails);
        $title = $article->title;
        $tags = Tag::lists('name','id');
        $selectedTags = $article->tags()->lists('id')->toArray();
        $description = $article->description;
        return view('editContent.editArticle')->
            with(compact('articleDetails', 'title','description','selectedTags','tags','article'));
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
//        dd($isPublishedByAdmin);
//        Log::info("update(ArticleRequest $request, $id)");
        DB::beginTransaction();
        try {
            $article = Article::findorFail($id);
            $article->title = $request->get('title');
            $article->description = $request->get('description');
            $article->isPublishedByAdmin = ($request->get('isPublishedByAdmin') =='on' ? 1 : 0);
            $article->isPublished = ($request->get('isPublished') =='on' ? 1 : 0);
            $article->body = $request->get('articleBody0');
            $article->img_name = $this->get_string_between($request->get('articleBody0'), 'src="/images/', '"');

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
            $article->update();

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
            if((!(Auth::check()&&Auth::user()->roles()->lists('role')->contains('admin'))
            &&($request->get('isPublished')=='on'))) {
                Flash::overlay('Your Article has been sent to Verification Department, It will be live sooner');
            }
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

        DB::statement('INSERT INTO articles_hst
  SELECT *
  FROM articles WHERE articles.id ='.$id);

        DB::statement('INSERT INTO article_details_hst
  SELECT *
  FROM article_details WHERE article_details.article_id ='.$id);
        $article = Article::findorFail($id);
        $article->delete();
        Flash::warning('Article deleted.');
        return redirect('/home');
    }
}
