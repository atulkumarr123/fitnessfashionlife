<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['role'];
    public function articles(){
        return $this->belongsToMany('App\User');
    }
}
