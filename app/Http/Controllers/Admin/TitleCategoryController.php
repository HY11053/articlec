<?php

namespace App\Http\Controllers\Admin;

use App\AdminModel\TitleCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TitleCategoryController extends Controller
{
    public function TitleCategoryList(){
        $titleCategorylists=TitleCategory::orderBy('id','desc')->get();
        return view('admin.titlecategorylists',compact('titleCategorylists'));
    }

    public function TitleCategoryAdd(){
        return view('admin.titlecategoryadd');
    }

    public function PostTitleCategoryAdd(Request $request){
        if (TitleCategory::where('type',$request->type)->value('id')){
            exit('当前分类已存在');
        }
        if(TitleCategory::create($request->all())->wasRecentlyCreated){
            return redirect(action('TitleCategoryController@TitleCategoryList'));
        }else{
            exit('添加出错');
        }
    }

    public function TitleCategoryEdit ($id){
        $thistitlecategory=TitleCategory::findOrFail($id);
        return view('admin.titlecategoryedit',compact('id','thistitlecategory'));
    }

    public function PostTitleCategoryEdit(Request $request,$id){
        if (TitleCategory::where('type',$request->type)->value('id')){
            exit('当前分类已存在，不可修改为相同的分类名称');
        }
        TitleCategory::findOrFail($id)->update($request->all());
        return redirect(action('TitleCategoryController@TitleCategoryList'));
    }
}
