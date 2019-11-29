<?php

namespace App\Http\Controllers\Admin;

use App\AdminModel\ContentSource;
use App\AdminModel\TitleSource;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRegsiterRequest;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function UserLists(){
        $users=User::orderBy('id','desc')->paginate(30);
        return view('admin.users',compact('users'));
    }

    /**后台用户注册
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    function Register()
    {
        return view('admin.userregister');
    }

    /**后台用户注册处理
     * @param UserRegsiterRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    function PostRegister(UserRegsiterRequest $request)
    {
        $request['password']=bcrypt($request['password']);
        User::create($request->all());
        return redirect(action('UserController@UserLists'));
    }

    /**后台用户编辑
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    function Edit($id)
    {
        $thisUser=User::find($id);
        return view('admin.useredit',compact('thisUser'));
    }

    /**后台用户编辑提交处理
     * @param UserRegsiterRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    function PostEdit(UserRegsiterRequest $request,$id)
    {
        $request['password']=bcrypt($request['password']);
        User::find($id)->update($request->all());
        return redirect(action('UserController@UserLists'));
    }

    /**删除后台用户
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    function Delete($id)
    {
        User::find($id)->delete();
        return redirect(action('UserController@UserLists'));
    }

    /**后台用户文档统计
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function Anysis()
    {
        $users=User::orderBy('id','desc')->paginate(30);
        return view('admin.useranysis',compact('users'));
    }

    /**通知信息清除
     * @return \Illuminate\Http\RedirectResponse
     */
    public function NotificationClear()
    {
        $admin=User::find(auth('admin')->user()->id);
        $admin->unreadNotifications->markAsRead();
        return redirect()->back();

    }

    /**用户文档信息筛选
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function DataInfos(Request $request)
    {
        $users=User::pluck('name','id');
        $arguments=$request->all();
        if ($request->advertisement==0)
        {
            $articles=TitleSource::when($request->start_at, function ($query) use ($request) {

                return $query->where('created_at', '>',Carbon::parse($request->start_at));

            })->when($request->end_at, function ($query) use ($request) {

                return $query->where('created_at', '<',Carbon::parse($request->end_at));

            })->when($request->write, function ($query) use ($request) {

                return $query->where('write', User::where('id',$request->write)->value('name'));

            })->paginate(50);

        }elseif ($request->advertisement==1)
        {
            $articles=ContentSource::when($request->write, function ($query) use ($request) {

                return $query->where('write', Admin::where('id',$request->write)->value('name'));

            })->when($request->start_at, function ($query) use ($request) {

                return $query->where('created_at', '>',Carbon::parse($request->start_at));

            })->when($request->end_at, function ($query) use ($request) {

                return $query->where('created_at', '<',Carbon::parse($request->end_at));

            })->paginate(50);
        }
        return view('admin.userdatainfo',compact('users','articles','arguments'));
    }

}
