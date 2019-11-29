@extends('admin.layouts.admin_app')
@section('title')用户数据汇总@stop
@section('head')
    <link href="/adminlte/plugins/iCheck/all.css" rel="stylesheet">
    <link href="/adminlte/plugins/iCheck/flat/green.css" rel="stylesheet">
@section('head')
    <style>td.newcolor span a{color: #ffffff; font-weight: 400; display: inline-block; padding: 2px;} td.newcolor span{margin-left: 5px;}</style>
@stop
@stop
@section('header_position')
    <section class="content-header">
        <h1>User Anysis<small>User Anysis</small></h1>
        <ol class="breadcrumb"><li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li><li class="active">User Anysis</li></ol>
    </section>
@stop
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">文档发布汇总</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered table-hover text-center">
                        <tr>
                            <th style="width: 10px">id</th>
                            <th>姓名</th>
                            <th>内容模型</th>
                            <th>标题模型</th>
                            <th>今日总计</th>
                            <th>总计添加</th>
                        </tr>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->id}}.</td>
                                <td>{{$user->name}}</td>
                                <td>@if(\App\AdminModel\ContentSource::where('created_at','>',\Carbon\Carbon::today())->where('dutyadmin',$user->id)->count()) <strong style="color: red"> {{\App\AdminModel\ContentSource::where('created_at','>',\Carbon\Carbon::today())->where('dutyadmin',$user->id)->count()}} </strong>@endif </td>
                                <td>@if(\App\AdminModel\TitleSource::where('created_at','>',\Carbon\Carbon::today())->where('dutyadmin',$user->id)->count()) <strong style="color: red">{{\App\AdminModel\TitleSource::where('created_at','>',\Carbon\Carbon::today())->where('dutyadmin',$user->id)->count()}}</strong>@endif  </td>
                                <td>{{(\App\AdminModel\ContentSource::where('created_at','>',\Carbon\Carbon::today())->where('created_at','<',\Carbon\Carbon::tomorrow())->where('dutyadmin',$user->id)->count())+(\App\AdminModel\TitleSource::where('created_at','>',\Carbon\Carbon::today())->where('created_at','<',\Carbon\Carbon::tomorrow())->where('dutyadmin',$user->id)->count())}} </td>
                                <td>{{(\App\AdminModel\ContentSource::where('created_at','>',\Carbon\Carbon::today())->where('dutyadmin',$user->id)->count())+(\App\AdminModel\TitleSource::where('created_at','>',\Carbon\Carbon::today())->where('dutyadmin',$user->id)->count())}} </td>
                            </tr>
                            <tr>
                        @endforeach
                    </table>
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">

                </div>
            </div>
            <!-- /.box -->
        </div>
    </div>
@stop
@section('libs')

@stop


