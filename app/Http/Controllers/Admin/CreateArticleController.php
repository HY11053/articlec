<?php

namespace App\Http\Controllers\Admin;

use App\AdminModel\ArticleCategory;
use App\AdminModel\ArticleCollection;
use App\AdminModel\ArticleType;
use App\AdminModel\BrandInfo;
use App\AdminModel\ConditionData;
use App\AdminModel\ContentSource;
use App\AdminModel\TitleCategory;
use App\AdminModel\TitleSource;
use App\AdminModel\Websites;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateArticleRequest;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CreateArticleController extends Controller
{
    /**普通文档生成创建
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function CreateArticle(){
        //行业分类
        $articlecategorys=ArticleCategory::orderBy('id','desc')->pluck('typename','id');
        //标题分类
        $titleTypes=TitleCategory::orderBy('id','desc')->pluck('type','id');
        //内容分类
        $articletypes=ArticleType::orderBy('sortrank','asc')->get(['id','content_type']);
        //绑定站点
        $websites=Websites::where('isused',1)->get(['id','webname']);
        return view('admin.create_article',compact('articletypes','articlecategorys','titleTypes','websites'));
    }

    /**普通文档创建生成处理
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function PostCreateArticle (Request $request){
        $this->ArticletitleCheck($request->brand);
        $articlecategorys=ArticleCategory::orderBy('id','desc')->pluck('typename','id');
        $titleTypes=TitleCategory::orderBy('id','desc')->pluck('type','id');
        $articletypes=ArticleType::orderBy('sortrank','asc')->get(['id','content_type']);
        $createinfo=collect(['brand'=>$request->brand,'categorytypeid'=>$request->categorytypeid,'title_typeid'=>$request->title_typeid,'content_type'=>$request->content_type]);
        $brandinfos=BrandInfo::where('brandname','like','%'.$request->brand.'%')->inRandomOrder()->value('brandinfo');
        $collectcontent=strip_tags(ArticleCollection::where('brandname','like','%'.$request->brand.'%')->orWhere('title','like','%'.$request->brand.'%')->inRandomOrder()->value('body'));
        $title=TitleSource::where('typeid',$request->title_typeid)->inRandomOrder()->value('title');
        $content_types=$request->content_type;
        $articlecontents=[];
        foreach ($content_types as $content_type){
            $minusedid=ContentSource::where('typeid',$request->categorytypeid)->where('content_type',$content_type)->min('used');
            $randomarticle=ContentSource::where('typeid',$request->categorytypeid)->where('content_type',$content_type)->where('used',$minusedid)->orderBy('used','asc')->inRandomOrder()->first(['id','content','used']);
            $articlecontents[ArticleType::where('id',$content_type)->value('content_type')]=$randomarticle;
           //加盟条件处理
            if ($content_type==4 && !empty($randomarticle)){
                $minconditionusedid=ConditionData::min('used');
                $conditionhead=ConditionData::where('used',$minconditionusedid)->orderBy('used','asc')->inRandomOrder()->first(['id','body','used']);
               if (!empty($conditionhead)){
                   $randomarticle->content=$conditionhead->body.$randomarticle->content;
                   $articlecontents[ArticleType::where('id',$content_type)->value('content_type')]=$randomarticle;
                   ConditionData::where('id',$conditionhead->id)->update(['used'=>$conditionhead->used+1]);
               }
            }
            if(!empty($randomarticle)){
                ContentSource::where('id',$randomarticle->id)->update(['used'=>$randomarticle->used+1]);
            }
        }
        $website=$request->website;
        $websites=Websites::where('isused',1)->get(['id','webname']);
        $thiwebinfo=Websites::where('id',$request->website)->first();
        //自动获取当前品牌所属分类
        $thisbrandid=$this->getWebsiteBrandid($website,$request->brand);
        if (!empty(json_decode($thisbrandid,true))){
            $thisbrandid= json_decode($thisbrandid,true);
            $brandcid=json_decode($this->GetWebsiteTid($website),true);
            $brandtypeid=json_decode($this->GetWebsiteSontypes($website,$thisbrandid["cid"]),true);
            $brandid=json_decode($this->GetWebsiteBdname($website,$thisbrandid["typeid"]),true);
            $brandpay=$this->GetWebsiteBrandpay($website,$thisbrandid['id']);
        }else{
            $thisbrandid='';
            $brandcid=[];
            $brandtypeid=[];
            $brandid=[];
            $brandpay='';
        }
        return view('admin.postcreate_article',compact('articletypes','articlecategorys','titleTypes','brandinfos','articlecontents','createinfo','title','websites','website','thisbrandid','brandcid','brandtypeid','brandid','collectcontent','thiwebinfo','brandpay'));
    }


    /**品牌文档生成创建
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function CreateBrandArticle (){
        $articletypes=ArticleType::orderBy('sortrank','asc')->get(['id','content_type']);
        $articlecategorys=ArticleCategory::orderBy('id','desc')->pluck('typename','id');
        $titleTypes=TitleCategory::orderBy('id','desc')->pluck('type','id');
        $websites=Websites::where('isused',1)->get(['id','webname']);
        return view('admin.create_brandarticle',compact('articletypes','articlecategorys','titleTypes','websites'));
    }

    /**品牌文档推送处理
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function PostCreateBrandArticle(Request $request){
        $this->ArticletitleCheck($request->brand);
        $articlecategorys=ArticleCategory::orderBy('id','desc')->pluck('typename','id');
        $titleTypes=TitleCategory::orderBy('id','desc')->pluck('type','id');
        $articletypes=ArticleType::orderBy('sortrank','asc')->get(['id','content_type']);
        $createinfo=collect(['brand'=>$request->brand,'categorytypeid'=>$request->categorytypeid,'title_typeid'=>$request->title_typeid,'content_type'=>$request->content_type]);
        $brandinfos=BrandInfo::where('brandname','like','%'.$request->brand.'%')->inRandomOrder()->value('brandinfo');//strip_tags(
        $title=TitleSource::where('typeid',$request->title_typeid)->inRandomOrder()->value('title');
        $content_types=$request->content_type;
        $articlecontents=[];
        foreach ($content_types as $content_type){
            $minusedid=ContentSource::where('typeid',$request->categorytypeid)->where('content_type',$content_type)->min('used');
            $randomarticle=ContentSource::where('typeid',$request->categorytypeid)->where('content_type',$content_type)->where('used',$minusedid)->orderBy('used','asc')->inRandomOrder()->first(['id','content','used']);
            $articlecontents[ArticleType::where('id',$content_type)->value('content_type')]=$randomarticle;
            //加盟条件处理
            if ($content_type==4 && !empty($randomarticle)){
                $minconditionusedid=ConditionData::min('used');
                $conditionhead=ConditionData::where('used',$minconditionusedid)->orderBy('used','asc')->inRandomOrder()->first(['id','body','used']);
                if (!empty($conditionhead)){
                    $randomarticle->content=$conditionhead->body.$randomarticle->content;
                    $articlecontents[ArticleType::where('id',$content_type)->value('content_type')]=$randomarticle;
                    ConditionData::where('id',$conditionhead->id)->update(['used'=>$conditionhead->used+1]);
                }
            }
            if(!empty($randomarticle)){
                ContentSource::where('id',$randomarticle->id)->update(['used'=>$randomarticle->used+1]);
            }
        }
        $website=$request->website;
        $thiwebinfo=Websites::where('id',$request->website)->first();
        $websites=Websites::where('isused',1)->get(['id','webname','weburl']);
        $brandpay='';
        return view('admin.postcreate_brandarticle',compact('articletypes','articlecategorys','titleTypes','brandinfos','articlecontents','createinfo','title','websites','website','thiwebinfo','brandpay'));
    }


    /**获取当前品牌id
     * @param $websites
     * @param $brandname
     * @return mixed
     */
    private function getWebsiteBrandid($websites,$brandname){
        $client = new Client();
        $weburl=trim(Websites::where('id',$websites)->value('weburl'),'/');
        $brandidResponse = $client->get($weburl.'/api/getbrandidapi/?brandname='.$brandname,['verify' => false])->getBody()->getContents();
        return $brandidResponse;
    }
    /**获取对应绑定站点顶级品牌分类
     * @param Request $request
     * @return mixed
     */
    private function GetWebsiteTid($website)
    {
        $client = new Client();
        $weburl=trim(Websites::where('id',$website)->value('weburl'),'/');
        $brandarticlesResponse = $client->get($weburl.'/api/brandtidapi/',['verify' => false])->getBody()->getContents();
        return $brandarticlesResponse;
    }

    /**获取对应绑定站点对应顶级分类下子分类
     * @param Request $request
     * @return mixed
     */
    private function GetWebsiteSontypes($website,$cid){
        $client = new Client();
        $weburl=trim(Websites::where('id',$website)->value('weburl'),'/');
        $brandarticlesResponse = $client->get($weburl.'/api/brandcidapi/?topid='.$cid,['verify' => false])->getBody()->getContents();
        return $brandarticlesResponse;
    }

    /**获取对应品牌分类下品牌名称
     * @param Request $request
     * @return mixed
     */
    private function GetWebsiteBdname($website,$typeid){
        $client = new Client();
        $weburl=trim(Websites::where('id',$website)->value('weburl'),'/');
        $brandarticlesResponse = $client->get($weburl.'/api/getbdnameapi/?brandtypeid='.$typeid,['verify' => false])->getBody()->getContents();
        return $brandarticlesResponse;
    }

    /**获取对应品牌投资金额
     * @param Request $request
     * @return mixed
     */
    private function GetWebsiteBrandpay($website,$brandid){
        $client = new Client();
        $weburl=trim(Websites::where('id',$website)->value('weburl'),'/');
        $brandpayResponse = $client->get($weburl.'/api/getbdpayapi/?id='.$brandid,['verify' => false])->getBody()->getContents();
        return $brandpayResponse;
    }

    /**违禁词检测
     * @param $brandname
     */
    private function ArticletitleCheck($brandname)
    {
        if (Storage::exists('guarded.txt'))
        {
            $filtertitles=array_unique(array_filter(explode(PHP_EOL,Storage::get('guarded.txt'))));
            foreach ($filtertitles as $filtertitle)
            {
                if ($brandname==trim($filtertitle))
                {
                    exit('违禁词，不允许发布');
                }
            }
        }
    }

}
