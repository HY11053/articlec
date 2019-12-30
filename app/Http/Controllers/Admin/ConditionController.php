<?php

namespace App\Http\Controllers\Admin;

use App\AdminModel\ConditionData;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConditionController extends Controller
{
    /**加盟条件附加头部列表
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function conditionLists(){
        $conditionlists=ConditionData::orderBy('id','desc')->paginate(30);
        return view('admin.conditionlists',compact('conditionlists'));
    }

    /**加盟条件附加头部添加
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function conditionAdd(){
        return view('admin.conditionadd');
    }

    /**加盟条件附加头部添加处理
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function postConditionAdd(Request $request){
        $request['write']=Auth::user()->name;
        foreach (explode(PHP_EOL,$request->body) as $body){
            if (empty(ConditionData::where('body',$body)->value('body'))){
                ConditionData::create(['body'=>$body,'write'=>$request['write']]);
            }
        }
        return redirect(action('ConditionController@conditionLists'));
    }

    /**加盟条件附加头部编辑
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function conditionEdit($id){
        $thisconditionInfo=ConditionData::findOrFail($id);
        return view('admin.conditionedit',compact('thisconditionInfo'));
    }

    /**加盟条件附加头部编辑处理
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function postConditionEdit(Request $request,$id){
        ConditionData::findOrFail($id)->update($request->all());
        return redirect(action('ConditionController@conditionLists'));
    }

    /**加盟条件附加头部删除
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function delete($id){
        ConditionData::where('id',$id)->delete();
        return redirect(action('ConditionController@conditionLists'));
    }
}
