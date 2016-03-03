<?php

namespace App\Http\Helpers;


use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ArticlesControllerHelper extends Controller{

    public static function  processCoverImage($request){
        if($request->file('image')!=null){
            $imageName =  $request->get('title') . '.' .
                $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(
                base_path().'/public/images/'.$request->get('title'), $imageName);
        }
        else{
            $imageName = str_replace('%20', ' ', ArticlesControllerHelper::get_string_between($request->get('articleBody0'), 'src="/images/', '"'));
            if(!File::exists(base_path().'/public/images/'.$request->get('title').'/'.$imageName)) {
                if(!File::exists(base_path().'/public/images/'.$request->get('title'))) {
                    mkdir(base_path().'/public/images/' . $request->get('title'), 0777, true);
                }
                copy(base_path().'/public/images/'.$imageName,
                    base_path().'/public/images/'.$request->get('title').'/'.$imageName);
            }
        }
        return $imageName;
    }
    public static function get_string_between($string, $start, $end){
        $string = ' ' . $string;
        $ini = strpos($string, $start);
        if ($ini == 0) return '';
        $ini += strlen($start);
        $len = strpos($string, $end, $ini) - $ini;
        return substr($string, $ini, $len);
    }

}