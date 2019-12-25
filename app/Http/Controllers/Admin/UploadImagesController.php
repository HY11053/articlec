<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadImagesController extends Controller
{
    public function UploadImage(Request $request){
        $imgkey=$request['img_key'];
        if(!empty($request[$imgkey])){
            if(!$request->hasFile($imgkey)){
                exit('上传文件为空！');
            }else{
                $storePath='public/uploads'.date('/Y/m/d',time());
                $file = $request->file($imgkey);
                $allowed_extensions = ["png", "jpg", "gif","jpeg"];
                if ($file->getClientOriginalExtension() && !in_array($file->getClientOriginalExtension(), $allowed_extensions))
                {
                    exit('图片类型错误，只能上传 png, jpg jpeg or gif等类型文件');
                }
                $extension = $file->getClientOriginalExtension();
                $path = Storage::putFileAs($storePath, $file, md5(time()+rand(1500,2511).auth('web')->user()->email).'.'.$extension);
                $data=Storage::readStream($path);
                $client = new Client();
                $res = $client->request('POST', 'http://www.u88.net/api/brandarticle/push',['verify' => false,'body' => $data])->getBody();
                return json_encode(array('link'=>"$res"));
            }
        }
    }
}
