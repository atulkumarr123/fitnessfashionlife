<?php

namespace App\Http\Helpers;


use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ArticlesControllerHelper extends Controller{

    public static function  processCoverImage($request){
        if($request->file('image')!=null){
            $underScoredImageName = ArticlesControllerHelper::underScoreIt($request->get('title') . '.' .$request->file('image')->getClientOriginalExtension());
            $underScoredTitle = ArticlesControllerHelper::underScoreIt($request->get('title'));
//            $imageName =  $request->get('title') . '.' .
//                $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(
                base_path().'/public/images/'.$underScoredTitle, $underScoredImageName);
        }
        else{
            $imageName = str_replace('%20', ' ', ArticlesControllerHelper::get_string_between($request->get('articleBody0'), 'src="/images/', '"'));
            $underScoredImageName = str_replace('%20', '_', ArticlesControllerHelper::get_string_between($request->get('articleBody0'), 'src="/images/', '"'));
            $underScoredTitle = ArticlesControllerHelper::underScoreIt($request->get('title'));
            if(!File::exists(base_path().'/public/images/'.$underScoredTitle.'/'.$underScoredImageName)) {
                if(!File::exists(base_path().'/public/images/'.$underScoredTitle)) {
                    mkdir(base_path().'/public/images/' . $underScoredTitle, 0777, true);
                }
//                dd($imageName);
                if($underScoredImageName){
                copy(base_path().'/public/images/'.$imageName,
                    base_path().'/public/images/'.$underScoredTitle.'/'.$underScoredImageName);
                }
            }
        }
        return $underScoredImageName;
    }
    public static function get_string_between($string, $start, $end){
        $string = ' ' . $string;
        $ini = strpos($string, $start);
        if ($ini == 0) return '';
        $ini += strlen($start);
        $len = strpos($string, $end, $ini) - $ini;
        return substr($string, $ini, $len);
    }

    public static function underScoreIt($string){
        $underScored = str_replace(' ', '_',$string);
        return $underScored;
    }

}