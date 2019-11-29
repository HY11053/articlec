<?php

namespace App\Http\Controllers\Admin;

use App\AdminModel\TitleCategory;
use App\AdminModel\TitleSource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TitleController extends Controller
{
    public function TitleLists($id){
     $titles=TitleSource::where('typeid',$id)->orderBy('id','desc')->paginate(30);
     return view('admin.titlelists',compact('titles'));
    }

    /**表单数据导入视图
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function FmImportTitles(){
        $titleTypes=TitleCategory::orderBy('id','desc')->pluck('type','id')->toArray();
        $titleTypes[0]='Null';
        asort($titleTypes);
        return view('admin.titleimport',compact('titleTypes'));
    }

    /**表单数据导入处理
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function PostFmImportTitles(Request $request){
        $request['dutyadmin']=Auth::id();
        $request['write']=Auth::user()->name;
        if (!$request->typeid){
            exit('请选择对应的标题分类');
        }
        foreach (explode(PHP_EOL,$request['content']) as $title){
            TitleSource::firstOrCreate(
                [
                    'typeid'=>$request->typeid,
                    'dutyadmin'=>$request['dutyadmin'],
                    'write'=>$request['write'],
                    'title'=>trim($title)
                ]
            );
        }
        return redirect(action('TitleController@TitleLists',['id'=>$request['typeid']]));
    }


    /**导入内容编辑视图
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function TitleEdit ($id){
        $thisTitleInfo=TitleSource::findOrFail($id);
        $titleTypes=TitleCategory::orderBy('id','desc')->pluck('type','id')->toArray();
        $titleTypes[0]='Null';
        asort($titleTypes);
        return view('admin.title_edit',compact('thisTitleInfo','titleTypes'));
    }

    /**导入内容编辑处理
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function PostTitleEdit(Request $request,$id){
        if (!$request->typeid){
            exit('请选择对应的行业分类或内容分类');
        }
        TitleSource::where('id',$id)->update(
            [
                'typeid'=>$request->typeid,
                'title'=>trim($request['title'])
            ]
        );
        return redirect(action('TitleController@TitleLists',['id'=>$request['typeid']]));
    }

    /**删除指定导入内容
     * @param $id
     * @param $type
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function Delete($id,$type){
        TitleSource::where('id',$id)->delete();
        return redirect(action('TitleController@TitleLists',['id'=>$type]));
    }

}
