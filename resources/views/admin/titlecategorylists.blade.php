@extends('admin.layouts.admin_app')
@section('title')标题分类管理@stop
@section('head')
    <link href="/adminlte/plugins/iCheck/all.css" rel="stylesheet">
    <link href="/adminlte/plugins/iCheck/flat/green.css" rel="stylesheet">
    <style>.red{color: red;}</style>
@stop
@section('header_position')
    <section class="content-header">
        <h1>TitleCategories<small>Title Category Lists</small></h1>
        <ol class="breadcrumb"><li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li><li class="active">TitleCategories</li></ol>
    </section>
@stop
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">标题分类列表</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered text-center">
                        <tr>
                            <th style="width: 10px">id</th>
                            <th>分类名称</th>
                            <th>创建时间</th>
                            <th style="width: 120px; text-align: center;">操作</th>
                        </tr>
                        @foreach($titleCategorylists as $titleCategorylist)
                            <tr>
                                <td>{{$titleCategorylist->id}}.</td>
                                <td>{{$titleCategorylist->type}}</td>
                                <td>{{$titleCategorylist->created_at}}</td>
                                <td style="text-align: center;">
                                    <a href="/title/titlecategory/edit/{{$titleCategorylist->id}}"><span class="label label-success" style="font-weight: normal">编辑</span></a>
                                </td>
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


