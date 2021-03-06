@extends('admin.layouts.admin_app')
@section('title')数据内容导入@stop
@section('head')
    <link href="/adminlte/plugins/iCheck/all.css" rel="stylesheet">
    <link href="/adminlte/plugins/iCheck/flat/green.css" rel="stylesheet">
    <link href="/adminlte/plugins/select2/select2.min.css" rel="stylesheet">
    <style>
        .red{color: red;}
        .select2-container--default .select2-selection--single {
            border-radius: 0px;
        }
        .select2-container .select2-selection--single {
            height: 34px;
            border: 1px solid #d2d6de;
        }
        .select2-container .select2-selection--single .select2-selection__rendered {
            padding-left: 0px;
        }
    </style>
@stop
@section('header_position')
    <section class="content-header">
        <h1>Article Data Import<small>Article Data Import</small></h1>
        <ol class="breadcrumb"><li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li><li class="active">ArticleDataImport</li></ol>
    </section>
@stop
@section('content')
    <div class="row">
        {{Form::open(array('route' => 'fmimportcontents'))}}
        <div class="col-md-12">
            <!-- The time line -->
            <ul class="timeline">
                <!-- timeline time label -->
                <li class="time-label">
                  <span class="bg-red">
                     数据内容导入
                  </span>
                </li>
                <!-- timeline item -->
                <li>
                    <i class=" fa fa-file-text bg-maroon"></i>

                    <div class="timeline-item">
                        <span class="time"><i class="fa fa-bell-o"></i> {}为需要替换的品牌名称,@@为需要关联的换行 一行一组 最大不超过500行</span>

                        <h3 class="timeline-header"><a href="#">数据内容导入|</a> 请按需导入</h3>

                        <div class="timeline-body">
                            <div class="row">

                                <div class="form-group col-md-6">
                                    {{Form::label('typeid',  '行业分类', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12','style'=>'padding-top:5px;'))}}
                                    <div class="col-md-8 input-group col-sm-9 col-xs-12">
                                        <div class="input-group-addon">
                                            <i class="fa fa-random" style="width:10px;"></i>
                                        </div>
                                        {{Form::select('typeid', $categoryTypes, null,array('class'=>'form-control pull-right select2'))}}
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    {{Form::label('content_type',  '内容分类', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12','style'=>'padding-top:5px;'))}}
                                    <div class="col-md-8 input-group col-sm-9 col-xs-12">
                                        <div class="input-group-addon">
                                            <i class="fa fa-file-text-o" style="width:10px;"></i>
                                        </div>
                                        {{Form::select('content_type', $contentTypes, null,array('class'=>'form-control pull-right select2'))}}
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    {{Form::textarea('content',null, array('class' => 'form-control col-md-10','id'=>'content','rows'=>27,'placeholder'=>'根据说明按需导入'))}}
                                </div>
                            </div>
                        </div>
                        <div class="timeline-footer">
                            <button type="submit"  class="btn btn-md bg-maroon">提交数据</button>
                        </div>
                    </div>
                </li>
                <!-- END timeline item -->
                <li>
                    <i class="fa fa-clock-o bg-gray"></i>
                </li>
            </ul>

        </div>
        <!-- /.col -->
        {!! Form::close() !!}

    </div>
    @if(count($errors) > 0)
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
@stop
@section('libs')
    <!-- iCheck -->
    <script src="/adminlte/plugins/iCheck/icheck.min.js"></script>
    <script src="/adminlte/plugins/select2/select2.full.min.js"></script>
    <script src="/adminlte/plugins/select2/i18n/zh-CN.js"></script>
    <script src="/adminlte/validator.js"></script>
    <script>
        $(function () {
            $('.select2').select2({language: "zh-CN"});
        });
        </script>
@stop

