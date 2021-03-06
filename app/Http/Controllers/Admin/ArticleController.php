<?php

namespace App\Http\Controllers\Admin;

use App\AdminModel\ArticleCategory;
use App\AdminModel\ArticleType;
use App\AdminModel\ContentSource;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    /**加盟费用内容列表
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function ArticleTypeLists(Request $request,$id){
        $id=$request->id;
        $arguments=$request->all();
        $articles=ContentSource::when($request->end_at, function ($query) use ($request) {

            return $query->where('created_at', '<',Carbon::parse($request->end_at));

        })->when($request->start_at, function ($query) use ($request) {

            return $query->where('created_at', '>',Carbon::parse($request->start_at));

        })->when($request->typeid, function ($query) use ($request) {

            return $query->where('typeid', $request->typeid);

        })->when($request->content_type, function ($query) use ($request) {

            return $query->where('content_type', $request->content_type);

        }, function ($query) use ($id) {
            return $query->where('content_type',$id);
        })->orderBy('id','desc')->paginate(30);
        $articleCategories=ArticleCategory::orderBy('id','desc')->pluck('typename','id');
        $articleTypes=ArticleType::orderBy('id','desc')->pluck('content_type','id');
        return view('admin.articlelists',compact('articles','articleCategories','articleTypes','id','arguments'));
    }

    /**表单数据导入视图
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function FmImportContents(){
        $categoryTypes=ArticleCategory::orderBy('id','desc')->pluck('typename','id')->toArray();
        $categoryTypes[0]='Null';
        asort($categoryTypes);
        /*$contentTypes=['null','加盟费用','加盟优势','加盟条件','加盟流程','加盟支持','开店选址','利润分析','开店问答'];*/
        $contentTypes=ArticleType::orderBy('id','desc')->pluck('content_type','id')->toArray();
        $contentTypes[0]='Null';
        asort($contentTypes);
        return view('admin.articleimport',compact('categoryTypes','contentTypes'));
    }

    /**表单数据导入处理
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function PostFmImportContents(Request $request){
        $request['dutyadmin']=Auth::id();
        $request['write']=Auth::user()->name;
        if (!$request->typeid || !$request->content_type){
            exit('请选择对应的行业分类或内容分类');
        }
        foreach (explode(PHP_EOL,$request['content']) as $content){
            ContentSource::firstOrCreate(
                [
                    'typeid'=>$request->typeid,
                    'dutyadmin'=>$request['dutyadmin'],
                    'write'=>$request['write'],
                    'content_type'=>$request['content_type'],
                    'content'=>trim($content)
                ]
            );
        }
        return redirect(action('ArticleController@ArticleTypeLists',['id'=>$request['content_type']]));
    }

    /**导入内容编辑视图
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function ArticleEdit ($id){
        $thisArticleInfo=ContentSource::findOrFail($id);
        $categoryTypes=ArticleCategory::orderBy('id','desc')->pluck('typename','id')->toArray();
        $categoryTypes[0]='Null';
        asort($categoryTypes);
        $contentTypes=ArticleType::orderBy('id','desc')->pluck('content_type','id')->toArray();
        $contentTypes[0]='Null';
        asort($contentTypes);
        return view('admin.article_edit',compact('thisArticleInfo','categoryTypes','contentTypes'));
    }

    /**导入内容编辑处理
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function PostArticleEdit(Request $request,$id){
        if (!$request->typeid || !$request->content_type){
            exit('请选择对应的行业分类或内容分类');
        }
        ContentSource::where('id',$id)->update(
            [
                'typeid'=>$request->typeid,
                'content_type'=>$request['content_type'],
                'content'=>trim($request['content'])
            ]
        );
        return redirect(action('ArticleController@ArticleTypeLists',['id'=>$request['content_type']]));
    }

    /**删除指定导入内容
     * @param $id
     * @param $type
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function Delete($id,$type){
        ContentSource::where('id',$id)->delete();
        return redirect(action('ArticleController@ArticleTypeLists',['id'=>$type]));
    }

    /**内容模型搜索
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function SearchArticleSource(Request $request){
        $articles=ContentSource::orderBy('id','desc')->where('content','like','%'.$request->contents.'%')->orderBy('id','desc')->paginate(30);
        $articleCategories=ArticleCategory::orderBy('id','desc')->pluck('typename','id');
        $articleTypes=ArticleType::orderBy('id','desc')->pluck('content_type','id');
        $arguments=$request->all();
        return view('admin.searcharticlelists',compact('articles','articleCategories','articleTypes','arguments'));
    }
}
