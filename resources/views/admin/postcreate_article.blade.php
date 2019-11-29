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
        .checkbox label{padding-left: 0px; padding-right: 20px;}
    </style>
@stop
@section('header_position')
    <section class="content-header">
        <h1>ArticleCategories<small>Article Category Lists</small></h1>
        <ol class="breadcrumb"><li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li><li class="active">ArticleCategories</li></ol>
    </section>
@stop
@section('content')
    <section class="content">

        <!-- row -->
        <div class="row">
            {{Form::model($createinfo,array('route' =>array('articlecreate'),'method' => 'post','files' => false,))}}
            <div class="col-md-12">
                <!-- The time line -->
                <ul class="timeline">
                    <!-- timeline time label -->
                    <li class="time-label">
                  <span class="bg-red">
                    article create
                  </span>
                    </li>
                    <!-- /.timeline-label -->
                    <!-- timeline item -->
                    <li>
                        <i class="fa fa-envelope bg-blue"></i>
                        <div class="timeline-item">
                            <span class="time"><i class="fa fa-clock-o"></i> 根据需求选择对应的选项生成文章</span>

                            <h3 class="timeline-header"><a href="#">生成选项 |</a> create options</h3>

                            <div class="timeline-body">
                                <div class="form-group col-md-12">
                                    {{Form::label('brandname', '品牌名称', array('class' => 'control-label col-md-1'))}}
                                    <div class="input-group col-md-4">
                                        <div class="input-group-addon"><i class="fa fa-user" style="width:10px;"></i></div>
                                        {{Form::text('brandname',null, array('class' => 'form-control  pull-right','id'=>'brandname','placeholder'=>'品牌名称'))}}
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    {{Form::label('typeid', '行业分类', array('class' => 'control-label col-md-1'))}}
                                    <div class="input-group col-md-4">
                                        <div class="input-group-addon">
                                            <i class="fa fa-cubes" style="width:10px;"></i>
                                        </div>
                                        {{Form::select('typeid', $articlecategorys, null,array('class'=>'form-control pull-right select2 ','style'=>'width: 100%'))}}
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    {{Form::label('title_typeid', '标题分类', array('class' => 'control-label col-md-1'))}}
                                    <div class="input-group col-md-4">
                                        <div class="input-group-addon">
                                            <i class="fa fa-language" style="width:10px;"></i>
                                        </div>
                                        {{Form::select('title_typeid', $titleTypes, null,array('class'=>'form-control pull-right select2','style'=>'width: 100%'))}}
                                    </div>
                                </div>
                                <div class="form-group col-md-12 basic_info">
                                    <label class="col-md-1  control-label">内容分类</label>
                                    <div class="checkbox" style="margin-top: 0px;">
                                        @foreach($articletypes as $articletype)
                                            <label>
                                                @if(in_array($articletype->id,$createinfo->get('content_type')))
                                                {{Form::checkbox('content_type[]', $articletype->id,true,array('class'=>'flat-red'))}} {{$articletype->content_type}}
                                                @else
                                                {{Form::checkbox('content_type[]', $articletype->id,false,array('class'=>'flat-red'))}} {{$articletype->content_type}}
                                                @endif
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="timeline-footer" style="clear: both;">
                                <button class="btn btn-primary btn-sm">点击生成</button>
                            </div>
                        </div>

                    </li>

                    <!-- END timeline item -->
                    <li>
                        <i class="fa fa-video-camera bg-maroon"></i>

                        <div class="timeline-item">
                            <span class="time"><i class="fa fa-clock-o"></i> 生成结果预览,无问题后点击复制</span>

                            <h3 class="timeline-header"><a href="#">生成结果 |</a> create result</h3>

                            <div class="timeline-body contentarea" style="padding: 50px;">
                              {{-- <h3> {{$createinfo->get('brandname')}}品牌介绍</h3>--}}
                                @foreach(explode(PHP_EOL,$articleinfos) as $articleinfo)
                                <p>{{$articleinfo}}</p>
                                @endforeach
                                @if(isset($articlecontents))
                                    @foreach($articlecontents as $content_type=>$articlecontent)
                                        <h3>{{$createinfo->get('brandname')}}{{$content_type}}</h3>
                                        @if(isset($articlecontent->content))
                                            @foreach(explode('@@',$articlecontent->content) as $content)
                                                <p>{{str_replace('{}',$createinfo->get('brandname'),$content)}}</p>
                                            @endforeach
                                        @endif
                                    @endforeach
                                @endif
                            </div>
                            <div class="timeline-footer">
                                <submit class="btn btn-sm bg-maroon" onclick="getCode();" onsubmit="return false;">复制内容</submit>
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
            <textarea id="createcontent" rows="3" style=" position: absolute;  left: 10000%;" ></textarea>
        </div>
        <!-- /.row -->
    </section>

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
        $('.basic_info input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({ checkboxClass: 'icheckbox_flat-green', radioClass: 'iradio_flat-green'});
    </script>

    <script>
        function getCode() {
            let text = document.querySelector(".contentarea").innerText;
            let textarea = document.querySelector("#createcontent");
            textarea.value = text; // 修改文本框的内容
            textarea.select(); // 选中文本
            let flag = document.execCommand("copy"); // 执行浏览器复制命令
            flag ? alert('复制成功') : alert('复制失败') //消息提示
        }
    </script>
@stop

