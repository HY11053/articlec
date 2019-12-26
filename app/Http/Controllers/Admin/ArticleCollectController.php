<?php

namespace App\Http\Controllers\Admin;

use App\AdminModel\ArticleCollection;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArticleCollectController extends Controller
{
    /**异步重新生成collect文档
     * @param Request $request
     * @return string
     */
    public function PostRegenerate(Request $request){
       return strip_tags(ArticleCollection::where('brandname','like','%'.$request->brand.'%')->orWhere('title','like','%'.$request->brand.'%')->inRandomOrder()->value('body'));
    }
}
