<?php

namespace App\Http\Controllers\Admin;

use App\AdminModel\Websites;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateArticleRequest;
use App\Http\Requests\CreateBrandArticleRequest;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WebsiteCategoryController extends Controller
{
    /**绑定站点列表
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function WebSIteLists(){
        $websites=Websites::orderBy('id','desc')->get();
        return view('admin.websitelists',compact('websites'));
    }

    /**添加绑定站点
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function WebsiteAdd(){
        return view('admin.websiteadd');
    }

    /**绑定站点添加处理
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function PostWebsiteAdd(Request $request){
        Websites::create($request->all());
        return redirect(action('WebsiteCategoryController@WebSIteLists'));
    }

    /**已绑定站点编辑
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function WebSIteEdit($id){
        $thiswebiste=Websites::findOrFail($id);
        return view('admin.website_edit',compact('thiswebiste'));

    }

    /**已绑定站点编辑处理
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function PostWebSIteEdit(Request $request,$id){
        Websites::findOrFail($id)->update($request->all());
        return redirect(action('WebsiteCategoryController@WebSIteLists'));
    }


    /**获取对应绑定站点顶级品牌分类
     * @param Request $request
     * @return mixed
     */
    public function GetWebsiteTid(Request $request)
    {
        $client = new Client();
        $weburl=trim(Websites::where('id',$request->website)->value('weburl'),'/');
        $brandarticlesResponse = $client->get($weburl.'/api/brandtidapi/',['verify' => false])->getBody()->getContents();
        return json_decode($brandarticlesResponse,true);
    }

    /**获取对应绑定站点对应顶级分类下子分类
     * @param Request $request
     * @return mixed
     */
    public function GetWebsiteSontypes(Request $request){
        $client = new Client();
        $weburl=trim(Websites::where('id',$request->website)->value('weburl'),'/');
        $brandarticlesResponse = $client->get($weburl.'/api/brandcidapi/?topid='.$request->topid,['verify' => false])->getBody()->getContents();
        return json_decode($brandarticlesResponse,true);
    }

    /**获取对应品牌分类下品牌名称
     * @param Request $request
     * @return mixed
     */
    public function GetWebsiteBdname(Request $request){
        $client = new Client();
        $weburl=trim(Websites::where('id',$request->website)->value('weburl'),'/');
        $brandarticlesResponse = $client->get($weburl.'/api/getbdnameapi/?brandtypeid='.$request->brandtypeid,['verify' => false])->getBody()->getContents();
        return json_decode($brandarticlesResponse,true);
    }

    /**获取对应站点对应文档分类
     * @param Request $request
     * @return mixed
     */
    public function GetWebsitenavs(Request $request){
        $client = new Client();
        $weburl=trim(Websites::where('id',$request->website)->value('weburl'),'/');
        $brandarticlesResponse = $client->get($weburl.'/api/getarticletypeapi',['verify' => false])->getBody()->getContents();
        return json_decode($brandarticlesResponse,true);
    }

    public function GetBrandPics(Request $request){
        $client = new Client();
        $weburl=trim(Websites::where('id',$request->website)->value('weburl'),'/');
        $brandarticlesResponse = $client->get($weburl.'/api/getbrandpicsapi?brandid='.$request->brandid,['verify' => false])->getBody()->getContents();
        return json_decode($brandarticlesResponse,true);

    }

    /**获取对应站点品牌省份信息
     * @param Request $request
     * @return mixed
     */
    public function GetProvinces(Request $request){
        $client = new Client();
        $weburl=trim(Websites::where('id',$request->website)->value('weburl'),'/');
        $brandprovincesResponse = $client->get($weburl.'/api/getbrandprovince',['verify' => false])->getBody()->getContents();
        return json_decode($brandprovincesResponse,true);
    }

    /**获取对应省份城市分类
     * @param Request $request
     * @return mixed
     */
    public function GetCitys(Request $request){
        $client = new Client();
        $weburl=trim(Websites::where('id',$request->website)->value('weburl'),'/');
        $brandcitysResponse = $client->get($weburl.'/api/getbrandcitys?province_id='.$request->province_id,['verify' => false])->getBody()->getContents();
        return json_decode($brandcitysResponse,true);
    }

    /**获取投资分类
     * @param Request $request
     * @return mixed
     */
    public function getInvestments(Request $request){
        $client = new Client();
        $weburl=trim(Websites::where('id',$request->website)->value('weburl'),'/');
        $brandinvestmentsResponse = $client->get($weburl.'/api/getinvestments',['verify' => false])->getBody()->getContents();
        return json_decode($brandinvestmentsResponse,true);
    }

    /**获取店铺面积分类
     * @param Request $request
     * @return mixed
     */
    public function getAcreagements(Request $request){
        $client = new Client();
        $weburl=trim(Websites::where('id',$request->website)->value('weburl'),'/');
        $brandAcreagementsResponse = $client->get($weburl.'/api/getacreagements',['verify' => false])->getBody()->getContents();
        return json_decode($brandAcreagementsResponse,true);
    }

    /**数据发送到对应站点
     * @param CreateArticleRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function PostArticlePush(CreateArticleRequest $request){
        $request['write']=Auth::user()->name;
        $client = new Client();
        $weburl=trim(Websites::where('id',$request->webname)->value('weburl'),'/');
        $response = $client->request('POST', $weburl.'/api/article/push', [
            'verify' => false,
            'form_params' =>$request->all()
        ]);
        return $response->getBody()->getContents();
    }

    public function PostBrandArticlePush(CreateBrandArticleRequest $request){
        $request['imagepics']=trim($request->imagepics,',');
        $request['write']=Auth::user()->name;
        $client = new Client();
        $weburl=trim(Websites::where('id',$request->webname)->value('weburl'),'/');
        $response = $client->request('POST', $weburl.'/api/brandarticle/push', [
            'verify' => false,
            'form_params' =>$request->all()
        ]);
        return $response->getBody()->getContents();
    }
}
