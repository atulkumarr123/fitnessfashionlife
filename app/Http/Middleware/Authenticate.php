<?php

namespace App\Http\Middleware;

use App\Article;
use App\User;
use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;

class Authenticate
{
    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param  Guard  $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$mode)
    {
        if(!(Auth::check()&&Auth::user()->roles()->lists('role')->contains('admin'))){
        if($mode=='edit'||$mode=='delete'){
        $article = Article::where('id', $request->id)->get()->first();
//            dd($article);
        $user = User::where('id', $article->user_id)->get()->first();
        if ($this->auth->guest()||(Auth::user()!=$user)) {
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->guest('auth/login');
            }
        }
        }
        else if($mode=='show'){
            $article = Article::where('id', $request->id)->get()->first();
            if(Auth::check()){
            if (!$article->isPublishedByAdmin&&$article->user_id!=Auth::user()->id) {
                if ($request->ajax()) {
                    return response('Unauthorized.', 401);
                } else {
                    return redirect()->guest('auth/login');
                }
            }}
        }
        else{
            if ($this->auth->guest()) {
                if ($request->ajax()) {
                    return response('Unauthorized.', 401);
                } else {
                    return redirect()->guest('auth/login');
                }
            }
        }
        }
        return $next($request);
    }
}
