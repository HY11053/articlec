<?php

namespace App\Http\Controllers\Admin;

use App\AdminModel\ArticleType;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArticleTypeController extends Controller
{
    /**内容分类列表
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function ArticletypeLists(){
        $articletypes=ArticleType::orderBy('id','desc')->get();
        return view('admin.articletypelists',compact('articletypes'));
    }

    /**内容分类添加视图
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function ArticletypeAdd(){
        return view('admin.articletypeadd');
    }

    /**内容分类添加处理
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function PostArticletypeAdd(Request $request){
        if (ArticleType::where('content_type',$request->content_type)->value('id')){
            exit('当前分类已存在，请正常添加分类下数据模板');
        }
        if(ArticleType::create($request->all())->wasRecentlyCreated){
            return redirect(action('ArticleTypeController@ArticletypeLists'));
        }else{
            exit('添加出错');
        }
    }

    /**内容编辑处理视图
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function ArticletypeEdit(Request $request,$id){

        $thisarticletype=ArticleType::findOrFail($id);
        return view('admin.articletypeedit',compact('id','thisarticletype'));
    }

    /**内容编辑处理
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function PostArticletypeEdit(Request $request,$id){
        if (ArticleType::where('content_type',$request->content_type)->value('id')){
            exit('当前内容分类已存在，不可修改为相同的分类名称');
        }
        ArticleType::findOrFail($id)->update($request->all());
        return redirect(action('ArticleTypeController@ArticletypeLists'));
    }
}
