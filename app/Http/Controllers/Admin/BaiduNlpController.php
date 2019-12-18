<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Log;

class BaiduNlpController extends Controller
{

    /**
     * 文档错误检测
     * @param $content
     */
    public function Ecnet(Request $request){
        //文本纠错功能
        $accesstoken=$this->getAccessToken();
        $ecnetapi='https://aip.baidubce.com/rpc/2.0/nlp/v1/ecnet?charset=UTF-8&access_token='.$accesstoken->access_token;
        $client = new Client();
        $ecnetresponse = $client->request('POST', $ecnetapi,[
            'verify' => false,
            'body' => json_encode(['text'=>strip_tags($request->contents)], JSON_UNESCAPED_UNICODE),
            'headers' => ['content-type' => 'application/json']
        ]);
        $sim = json_decode($ecnetresponse->getBody());

        $message='';
        if (isset($sim->item->vec_fragment) && count($sim->item->vec_fragment)){
            foreach ($sim->item->vec_fragment as $errs){
                $message.='文本错误-'.$errs->ori_frag.'建议改正'.$errs->correct_frag;
            }
        }else{
            $message='';
        }
        return $message;
    }


    /**百度accesstoken检测
     * @return mixed
     */
    private function getAccessToken(){
        $client = new Client();
        $api = "https://aip.baidubce.com/oauth/2.0/token";
        $response = $client->request('POST', $api, [
            'verify' => false,
            'form_params' => [
                'grant_type' => 'client_credentials',
                'client_id' => 'paKma5YZK6fsNwstDicYewfM',
                'client_secret' =>'HEepI0CBxvDmHUHMWWikr52Ao6VPiOyB',
            ]
        ]);
        return  json_decode($response->getBody());
    }
}
