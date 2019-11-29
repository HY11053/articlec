<?php

namespace App\Http\Controllers\Admin;

use App\AdminModel\ArticleCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArticleCategoryController extends Controller
{

    /**行业分类列表
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function ArticleCategoryLists(){
        $articlecategories=ArticleCategory::orderBy('id','desc')->paginate(30);
        return view('admin.articlecategorylists',compact('articlecategories'));
    }

    /**行业分类添加视图
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function ArticleCategoryAdd(){
        return view('admin.articlecategoryadd');
    }

    /**行业分类添加处理
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function PostArticleCategoryAdd(Request $request){
        if (ArticleCategory::where('typename',$request->typename)->value('id')){
            exit('当前分类已存在，请正常添加分类下数据模板');
        }
        if(ArticleCategory::create($request->all())->wasRecentlyCreated){
            return redirect(action('ArticleCategoryController@ArticleCategoryLists'));
        }else{
            exit('添加出错');
        }
    }

    /**行业分类编辑视图
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function ArticleCategoryEdit($id){
        $thisarticlecategory=ArticleCategory::findOrFail($id);
        return view('admin.articlecategoryedit',compact('id','thisarticlecategory'));
    }

    /**行业分类更改处理
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function PostArticleCategoryEdit(Request $request,$id){
        if (ArticleCategory::where('typename',$request->typename)->value('id')){
            exit('当前分类已存在，不可修改为相同的分类名称');
        }
        ArticleCategory::findOrFail($id)->update($request->all());
        return redirect(action('ArticleCategoryController@ArticleCategoryLists'));
    }
}
