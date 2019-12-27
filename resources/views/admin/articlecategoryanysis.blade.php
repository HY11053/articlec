@extends('admin.layouts.admin_app')
@section('title')行业分类数据汇总@stop
@section('head')
    <link href="/adminlte/plugins/iCheck/all.css" rel="stylesheet">
    <link href="/adminlte/plugins/iCheck/flat/green.css" rel="stylesheet">
    <style>.red{color: red;}</style>
@stop
@section('header_position')
    <section class="content-header">
        <h1>ArticleCategories<small>Article Category Anysis</small></h1>
        <ol class="breadcrumb"><li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li><li class="active">ArticleCategories Anysis</li></ol>
    </section>
@stop
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">行业分类数据汇总列表</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered text-center">
                        <tr>
                            <th style="width: 10px">id</th>
                            <th>分类名称</th>
                            @foreach($articletypes as $articletype)
                            <th>{{$articletype->content_type}}</th>
                            @endforeach
                        </tr>
                        @foreach($articlecategories as $articlecategorie)
                            <tr>
                                <td>{{$articlecategorie->id}}.</td>
                                <td>{{$articlecategorie->typename}}</td>
                                @foreach($articletypes as $articletype)
                                    <td>{{\App\AdminModel\ContentSource::where('typeid',$articlecategorie->id)->where('content_type',$articletype->id)->count()}}</td>
                                @endforeach
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
        {{$articlecategories->links()}}
    </div>
@stop


