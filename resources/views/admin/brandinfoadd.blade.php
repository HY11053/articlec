@extends('admin.layouts.admin_app')
@section('title')标题内容导入@stop
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
        <h1>ArticleCategories<small>Article Category Lists</small></h1>
        <ol class="breadcrumb"><li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li><li class="active">ArticleCategories</li></ol>
    </section>
@stop
@section('content')
    <div class="row">
        {{Form::open(array('route' => 'brandinfoadd'))}}
        <div class="col-md-12">
            <!-- The time line -->
            <ul class="timeline">
                <!-- timeline time label -->
                <li class="time-label">
                  <span class="bg-red">
                     标题内容导入
                  </span>
                </li>
                <!-- timeline item -->
                <li>
                    <i class=" fa fa-file-text bg-maroon"></i>

                    <div class="timeline-item">
                        <span class="time"><i class="fa fa-bell-o"></i>  填入对应的品牌简介内容</span>

                        <h3 class="timeline-header"><a href="#">标题内容导入|</a> 请按需导入</h3>

                        <div class="timeline-body">
                            <div class="row">

                                <div class="form-group col-md-6">
                                    {{Form::label('brandname',  '品牌名称', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12','style'=>'padding-top:5px;'))}}
                                    <div class="col-md-8 input-group col-sm-9 col-xs-12">
                                        <div class="input-group-addon">
                                            <i class="fa fa-file-text-o" style="width:10px;"></i>
                                        </div>
                                        {{Form::text('brandname', null,array('class'=>'form-control pull-right'))}}
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <textarea class="form-control" name="brandinfo" rows="27"></textarea>
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
    <script src="/adminlte/plugins/datepicker/bootstrap-datepicker.js"></script>
    <script src="/adminlte/plugins/datepicker/locales/bootstrap-datepicker.zh-CN.js"></script>
    <script src="/adminlte/plugins/bootstrap-fileinput/js/fileinput.min.js"></script>
    <script src="/adminlte/plugins/bootstrap-fileinput/js/locales/zh.js"></script>
    <script src="/adminlte/plugins/select2/select2.full.min.js"></script>
    <script src="/adminlte/plugins/select2/i18n/zh-CN.js"></script>
    <script src="/adminlte/validator.js"></script>
    <script>
        $(function () {
            $('.select2').select2({language: "zh-CN"});
        });
    </script>
@stop

