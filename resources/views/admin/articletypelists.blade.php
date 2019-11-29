@extends('admin.layouts.admin_app')
@section('title')内容分类管理@stop
@section('head')
    <link href="/adminlte/plugins/iCheck/all.css" rel="stylesheet">
    <link href="/adminlte/plugins/iCheck/flat/green.css" rel="stylesheet">
    <style>.red{color: red;}</style>
@stop
@section('header_position')
    <section class="content-header">
        <h1>ArticleTypes<small>Article Type Lists</small></h1>
        <ol class="breadcrumb"><li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li><li class="active">ArticleTypes</li></ol>
    </section>
@stop
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">内容分类列表</h3>
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
                        @foreach($articletypes as $articletype)
                            <tr>
                                <td>{{$articletype->id}}.</td>
                                <td>{{$articletype->content_type}}</td>
                                <td>{{$articletype->created_at}}</td>
                                <td style="text-align: center;">
                                    <a href="/article/type/edit/{{$articletype->id}}"><span class="label label-success" style="font-weight: normal">编辑</span></a>
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


