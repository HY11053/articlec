<?php

namespace App\Http\Controllers\Admin;

use App\AdminModel\PaymentCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentCategoryController extends Controller
{
    /**加盟费用行业分类列表
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function PaymentCategoryList(){
        $paymentcategories=PaymentCategory::orderBy('id','desc')->paginate(30);
        return view('admin.paymentcategorylist',compact('paymentcategories'));
    }

    /**加盟费用行业分类添加视图
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function PaymentAdd(){
        return view('admin.paymentcategoryadd');
    }

    /**加盟费用行业分类添加处理
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function PostPaymentAdd(Request $request){
        PaymentCategory::create($request->all());
        return redirect(action('PaymentCategoryController@PaymentCategoryList'));
    }

    /**编辑对应行业加盟费用分类
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function PaymentEdit($id){
        $thispaymentinfo=PaymentCategory::findOrFail($id);
        return view('admin.paymentcategoryedit',compact('thispaymentinfo'));
    }

    /**编辑对应行业加盟费用分类处理
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function PostPaymentEdit(Request $request ,$id){
        PaymentCategory::findOrFail($id)->update($request->all());
        return redirect(action('PaymentCategoryController@PaymentCategoryList'));
    }
}
