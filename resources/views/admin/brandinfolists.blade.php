@extends('admin.layouts.admin_app')
@section('title')品牌介绍管理@stop
@section('head')
    <link href="/adminlte/plugins/iCheck/all.css" rel="stylesheet">
    <link href="/adminlte/plugins/iCheck/flat/green.css" rel="stylesheet">
    <style>.red{color: red;}</style>
@stop
@section('header_position')
    <section class="content-header">
        <h1>Article Lists<small>Article  Lists</small></h1>
        <ol class="breadcrumb"><li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li><li class="active">Article Lists</li></ol>
    </section>
@stop
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">文档列表管理 文档总计{{$brandinfolists->total()}}</h3>
                    <div class="box-tools">
                        <div class="pull-right" style="display:inline-block; width: 220px">
                            <a href="{{action('BrandInfoController@BrandInfoAdd')}}" style="color: #ffffff ; display: inline-block; padding-left: 3px;"><button  class="btn btn-sm btn-default bg-blue"><i class="fa  fa-pencil-square" style="padding-right: 3px;"></i>添加品牌信息</button></a>
                        </div>
                        <form action="/admin/brand_search" method="post" class="form-group pull-right col-md-2 col-xs-6">
                            <div class="input-group input-group-sm ">
                                <input type="text" name="title" class="form-control pull-right" placeholder="品牌搜索">
                                {{csrf_field()}}
                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <div class="mailbox-controls">
                        <!-- Check all button -->
                        <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa  fa-check-circle"></i> 全选</button>
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-sm  delete-event" data-toggle="modal" data-target="#modal-default"><i class="fa fa-trash-o"> 批量删除</i></button>
                            <button type="button" class="btn btn-default btn-sm  edittype-event"  data-toggle="modal" data-target="#modal-default2"><i class="fa  fa-paint-brush"></i> 批量更改分类</button>
                        </div>
                    </div>
                    <div class="table-responsive mailbox-messages">
                        <table class="table table-hover">
                            <tr>
                                <th>#</th>
                                <th>ID</th>
                                <th>品牌名称</th>
                                <th>导入时间</th>
                                <th>内容预览</th>
                                <th>操作</th>
                            </tr>
                            @foreach($brandinfolists as $brandinfolist)
                                <tr>
                                    <td><input type="checkbox" name="articlecheck" value="{{$brandinfolist->id}}"></td>
                                    <td>{{$brandinfolist->id}}</td>
                                    <td>{{$brandinfolist->brandname}}</td>
                                    <td>@if(\Carbon\Carbon::now() > \Carbon\Carbon::parse($brandinfolist->created_at)->addDays(7)){{$brandinfolist->created_at}} @else{{\Carbon\Carbon::parse($brandinfolist->created_at)->diffForHumans()}}@endif </td>
                                    <td title="{{$brandinfolist->brandinfo}}">{{mb_substr($brandinfolist->brandinfo,0,50,'utf-8')}}...</td>
                                    <td class="astyle">
                                        <span class="label label-warning"><a href="/brandinfo/edit/{{$brandinfolist->id}}">编辑</a></span>
                                        <span class="label label-danger"><a href="/brandinfo/delete/{{$brandinfolist->id}}" >删除</a></span>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    {!! $brandinfolists->links() !!}
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
    <!-- /.content -->
@stop

