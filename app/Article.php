<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class  Article extends Model
{
    protected $fillable = ['title', 'description','body', 'published_at','img_name','user_id','isPublishedByAdmin'];

    public function articleDetails(){
        return $this->hasMany('App\ArticleDetail');
    }


    public function tags(){
        return $this->belongsToMany('App\Tag');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

}
