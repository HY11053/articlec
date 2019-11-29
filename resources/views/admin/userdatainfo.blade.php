@extends('admin.layouts.admin_app')
@section('title')数据导入筛选@stop
@section('head')
    <link rel="stylesheet" href="/adminlte/plugins/datepicker/datepicker3.css">
    <link href="/adminlte/plugins/select2/select2.min.css" rel="stylesheet">
@stop
@section('header_position')
    <section class="content-header">
        <h1>User data Filter<small>User data Filter</small></h1>
        <ol class="breadcrumb"><li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li><li class="active">User data Filter</li></ol>
    </section>
@stop
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">文档发布筛选 总计{{$articles->total()}}</h3>
                    {{Form::open(array('route' => 'userdatainfo','files' => false,'class'=>'form-inline pull-right','method'=>'get'))}}
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
                            {{Form::select('advertisement', ['标题模型','内容模型'], null,array('class'=>'form-control select2 pull-right','style'=>'width: 150px;','data-placeholder'=>"模型类型",'multiple'=>"multiple"))}}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-edit" style="width:10px;"></i>
                            </div>
                            {{Form::select('write', $users, null,array('class'=>'form-control select2  pull-right','style'=>'width: 100%','style'=>'width: 150px;','data-placeholder'=>"导入人员",'multiple'=>"multiple"))}}
                        </div>
                    </div>
                    <button type="submit" class="btn btn-danger">筛选数据</button>
                    </form>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th style="width: 10px">#ID</th>
                            <th>数据预览</th>
                            <th>发布时间</th>
                            <th>导入用户</th>
                            <th>所属分类</th>
                            <th>所属行业</th>
                        </tr>
                        @foreach($articles as $article)
                            <tr>
                                <td>{{$article->id}}</td>
                                <td>@if($article->title) {{mb_substr($article->title,0,100,'utf-8')}}...@else {{mb_substr($article->content,0,100,'utf-8')}}... @endif</td>
                                <td>{{$article->created_at}}</td>
                                <td>@if($article->editor) {{$article->editor}} @else {{$article->write}} @endif</td>
                                <td>@if($article->category->type) {{$article->category->type}} @else {{$article->category->typename}} @endif</td>
                                <td>@if(isset($article->articletype->content_type)) {{$article->articletype->content_type}} @else  @endif</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                    {!! $articles->appends($arguments)->links() !!}
                </div>
            </div>
            <!-- /.box -->
        </div>

    </div>
    <!-- /.row -->
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


