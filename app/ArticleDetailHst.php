<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticleDetailHst extends Model
{
    protected $fillable = ['body','img_name','counter','article_id'];

    public function article(){
        return $this->belongsTo('App\ArticleHst');
    }
}
