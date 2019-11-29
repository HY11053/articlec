<?php

namespace App\AdminModel;

use Illuminate\Database\Eloquent\Model;

class ContentSource extends Model
{
    protected $guarded=['_token'];
    public function category()
    {
        return $this->belongsTo('App\AdminModel\ArticleCategory','typeid');
    }
    public function articletype()
    {
        return $this->belongsTo('App\AdminModel\ArticleType','content_type');
    }
}
