<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticleDetail extends Model
{
    public function Article(){
        return $this->belongsTo('App\Article');
    }
}
