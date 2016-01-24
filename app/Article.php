<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class  Article extends Model
{
    protected $fillable = ['title', 'description','body', 'published_at'];

    public function articleDetails(){
        return $this->hasMany('App\ArticleDetail');
    }

}
