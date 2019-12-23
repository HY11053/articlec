<?php

namespace App\Http\Controllers\Admin;

use App\AdminModel\PaymentCategory;
use App\AdminModel\PaymentContent;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    /**加盟费用内容列表
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function PaymentList(){
        $articles=PaymentContent::orderBy('id','desc')->paginate(30);
        return view('admin.paymentlists',compact('articles'));
    }

    /**加盟费用添加视图
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function Paymentadd(){
        $categorynavs=PaymentCategory::orderBy('id','desc')->pluck('category','id');
        return view('admin.paymentadd',compact('categorynavs'));
    }

    /**加盟费用内容提交处理
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function PostPaymentadd(Request $request){
        $request['write']=Auth::user()->name;
        PaymentContent::create($request->all());
        return redirect(action('PaymentController@PaymentList'));
    }

    public function Paymentedit($id){
        $thispaymentInfo=PaymentContent::findOrFail($id);
        $categorynavs=PaymentCategory::orderBy('id','desc')->pluck('category','id');
        return view('admin.paymentedit',compact('thispaymentInfo','categorynavs'));
    }

    public function PostPaymentedit(Request $request,$id){
        PaymentContent::findOrFail($id)->update($request->all());
        return redirect(action('PaymentController@PaymentList'));
    }
}
