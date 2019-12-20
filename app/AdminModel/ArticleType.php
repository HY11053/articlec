<?php

namespace App\AdminModel;

use Illuminate\Database\Eloquent\Model;

class ArticleType extends Model
{
    protected $fillable=['content_type','sortrank'];
}
