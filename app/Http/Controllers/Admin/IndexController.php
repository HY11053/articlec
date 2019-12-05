<?php

namespace App\Http\Controllers\Admin;

use App\AdminModel\ArticleType;
use App\AdminModel\ContentSource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function Index(){
        $latestcontents=ContentSource::latest()->take(10)->get();
        $labelStyle=['label-danger','label-info','label-warning','label-success','label-primary','label-default','label-default','label-default','label-default','label-default','label-default','label-default','label-default','label-default'];
        $articletypes=ArticleType::all();
        return view('admin.index',compact('latestcontents','labelStyle','articletypes'));
    }
}
