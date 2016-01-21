<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticleDetail extends Model
{
    protected $fillable = ['body','img_name','counter'];

    public function Article(){
        return $this->belongsTo('App\Article');
    }
}
