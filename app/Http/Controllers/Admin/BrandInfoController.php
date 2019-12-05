<?php

namespace App\Http\Controllers\Admin;

use App\AdminModel\BrandInfo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BrandInfoController extends Controller
{

    /**品牌简介列表
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function BrandInfoLists(){
        $brandinfolists=BrandInfo::orderBy('id','desc')->paginate(30);
        return view('admin.brandinfolists',compact('brandinfolists'));
    }

    /**品牌简介添加
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function BrandInfoAdd(){
        return view('admin.brandinfoadd');
    }

    /**品牌简介添加处理
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function PostBrandInfoAdd(Request $request){
       if (  BrandInfo::where('brandname',$request->brandname)->value('brandname')){
            exit('当前品牌已存在');
        }
        if(BrandInfo::create($request->all())->wasRecentlyCreated){
            return redirect(action('BrandInfoController@BrandInfoLists'));
        }else{
            exit('添加出错');
        }
    }

    /**品牌简介编辑
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function BrandInfoEdit($id){
        $thisbrandinfo=BrandInfo::where('id',$id)->findOrFail($id);
        return view('admin.brandinfoedit',compact('thisbrandinfo'));
    }

    /**品牌简介编辑处理
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function PostBrandInfoEdit(Request $request,$id){
        BrandInfo::findOrFail($id)->update($request->all());
        return redirect(action('BrandInfoController@BrandInfoLists'));
    }

    /**删除对应品牌简介
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function Delete($id){
        BrandInfo::findOrFail($id)->delete();
        return redirect(action('BrandInfoController@BrandInfoLists'));
    }

    public function BrandSearch(Request $request){
        $brandinfolists=BrandInfo::orderBy('id','desc')->where('brandname','like','%'.$request->brandname.'%')->paginate(100);
        return view('admin.brandinfolists',compact('brandinfolists'));
    }
}
