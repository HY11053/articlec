@extends('admin.layouts.admin_app')
@section('title')内容分类管理@stop
@section('head')
    <link href="/adminlte/plugins/iCheck/all.css" rel="stylesheet">
    <link href="/adminlte/plugins/iCheck/flat/green.css" rel="stylesheet">
    <link rel="stylesheet" href="/adminlte/plugins/datepicker/datepicker3.css">
    <link href="/adminlte/plugins/select2/select2.min.css" rel="stylesheet">
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

                <div class="box-header with-border">
                    <h3 class="box-title">文档列表管理 文档总计{{$articles->total()}}</h3>
                            {{Form::open(array('route' =>array( 'articlelisttype','id'=>$id),'files' => false,'class'=>'form-inline pull-right','method'=>'get'))}}

                    <a href="{{action('ArticleController@FmImportContents')}}" style="color: #ffffff ; display: inline-block; padding-left: 3px;"><span  class="btn btn-default bg-blue"><i class="fa  fa-pencil-square" style="padding-right: 3px;"></i>表单提交导入</span></a>
                     <div class="form-group">
                            <div class="input-group date " >
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar" style="width:10px;"></i>
                                </div>
                                {{Form::text('start_at', null, array('class' => 'form-control pull-right','id'=>'datepicker','placeholder'=>'开始时间', 'autocomplete'=>"off",'style'=>'width:100%'))}}
                            </div>
                        </div>
                        <div class="input-group date " >
                            <div class="input-group-addon">
                                <i class="fa fa-calendar" style="width:10px;"></i>
                            </div>
                            {{Form::text('end_at', null, array('class' => 'form-control pull-right','id'=>'datepicker1','placeholder'=>'结束时间','autocomplete'=>"off",'style'=>'width:100%'))}}
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-location-arrow" style="width:10px;"></i>
                                </div>
                                {{Form::select('typeid', $articleCategories, null,array('class'=>'form-control select2 pull-right','style'=>'width: 150px;','data-placeholder'=>"行业分类",'multiple'=>"multiple"))}}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-location-arrow" style="width:10px;"></i>
                                </div>
                                {{Form::select('content_type', $articleTypes, null,array('class'=>'form-control select2 pull-right','style'=>'width: 150px;','data-placeholder'=>"内容分类",'multiple'=>"multiple"))}}
                            </div>
                        </div>

                        <button type="submit" class="btn btn-danger">筛选数据</button>
                    {!! Form::close() !!}

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
                                <th>行业分类</th>
                                <th>内容分类</th>
                                <th>使用次数</th>
                                <th>导入用户</th>
                                <th>导入时间</th>
                                <th>内容预览</th>
                                <th>操作</th>
                            </tr>
                            @foreach($articles as $article)
                                <tr>
                                    <td><input type="checkbox" name="articlecheck" value="{{$article->id}}"></td>
                                    <td>{{$article->id}}</td>
                                    <td>{{$article->category->typename}}</td>
                                    <td>{{$article->articletype->content_type}}</td>
                                    <td>{{$article->used}}</td>
                                    <td>{{$article->write}}</td>
                                    <td>@if(\Carbon\Carbon::now() > \Carbon\Carbon::parse($article->created_at)->addDays(7)){{$article->created_at}} @else{{\Carbon\Carbon::parse($article->created_at)->diffForHumans()}}@endif </td>
                                    <td title="{{$article->content}}">{{mb_substr($article->content,0,50,'utf-8')}}...</td>
                                    <td class="astyle">
                                        <span class="label label-warning"><a href="/article/edit/{{$article->id}}">编辑</a></span>
                                        <span class="label label-danger"><a href="/article/delete/{{$article->id}}/{{$article->content_type}}" >删除</a></span>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    {!! $articles->appends($arguments)->links() !!}
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
    <!-- /.content -->
@stop
@section('libs')
    <script src="/adminlte/plugins/iCheck/icheck.min.js"></script>
    <script src="/adminlte/plugins/datepicker/bootstrap-datepicker.js"></script>
    <script src="/adminlte/plugins/datepicker/locales/bootstrap-datepicker.zh-CN.js"></script>
    <script src="/adminlte/plugins/select2/select2.full.min.js"></script>
    <script>
        $('.select2').select2();
        $(function () {
            $('#datepicker,#datepicker1').datepicker({
                autoclose: true,
                language: 'zh-CN',
                todayHighlight: true
            });
        });
    </script>
@stop
