<?php

namespace App\Http\Controllers\Admin;

use App\AdminModel\ArticleCategory;
use App\AdminModel\ArticleType;
use App\AdminModel\BrandInfo;
use App\AdminModel\ContentSource;
use App\AdminModel\TitleCategory;
use App\AdminModel\TitleSource;
use App\AdminModel\Websites;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateArticleRequest;
use Illuminate\Http\Request;

class CreateArticleController extends Controller
{
    /**普通文档创建
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function CreateArticle(Request $request){
        $articletypes=ArticleType::orderBy('id','asc')->get(['id','content_type']);
        $articlecategorys=ArticleCategory::orderBy('id','desc')->pluck('typename','id');
        $titleTypes=TitleCategory::orderBy('id','desc')->pluck('type','id');
        $websites=Websites::where('isused',1)->get(['id','webname']);
        $webname=$request->webname;
        return view('admin.create_article',compact('articletypes','articlecategorys','titleTypes','websites','webname'));
    }

    /**普通文档创建生成处理
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function PostCreateArticle (Request $request){
        $articletypes=ArticleType::orderBy('id','asc')->get(['id','content_type']);
        $articlecategorys=ArticleCategory::orderBy('id','desc')->pluck('typename','id');
        $titleTypes=TitleCategory::orderBy('id','desc')->pluck('type','id');
        $createinfo=collect(['brandname'=>$request->brandname,'typeid'=>$request->typeid,'title_typeid'=>$request->title_typeid,'content_type'=>$request->content_type]);
        $articleinfos=strip_tags(BrandInfo::where('brandname','like',$request->brandname.'%')->inRandomOrder()->value('brandinfo'));
        $title=TitleSource::where('typeid',$request->title_typeid)->inRandomOrder()->value('title');
        $content_types=$request->content_type;
        $articlecontents=[];
        foreach ($content_types as $content_type){
            $randomarticle=ContentSource::where('typeid',$request->typeid)->where('content_type',$content_type)->orderBy('used','asc')->inRandomOrder()->first(['id','content','used']);
            $articlecontents[ArticleType::where('id',$content_type)->value('content_type')]=$randomarticle;
            if(!empty($randomarticle)){
                ContentSource::where('id',$randomarticle->id)->update(['used'=>$randomarticle->used+1]);
            }
        }
        $website=$request->website;
        $websites=Websites::where('isused',1)->get(['id','webname']);
        return view('admin.postcreate_article',compact('articletypes','articlecategorys','titleTypes','articleinfos','articlecontents','createinfo','title','websites','website'));
    }

    public function CreateBrandArticle (){
        exit('功能暂不开放');
    }

}
