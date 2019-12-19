@extends('admin.layouts.admin_app')
@section('title')普通文档生成@stop
@section('head')
    <link href="/adminlte/plugins/iCheck/all.css" rel="stylesheet">
    <link href="/adminlte/plugins/iCheck/flat/green.css" rel="stylesheet">
    <link href="/adminlte/plugins/select2/select2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/adminlte/plugins/datepicker/datepicker3.css">
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
        <h1>Article Generate<small>Article Generate submit</small></h1>
        <ol class="breadcrumb"><li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li><li class="active">Article Generate </li></ol>
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
                    article generate
                  </span>
                    </li>
                    <!-- /.timeline-label -->
                    <!-- timeline item -->
                    <li>
                        <i class="fa fa-user bg-aqua"></i>
                        <div class="timeline-item">
                            <span class="time"><i class="fa fa-bell-o"></i> 根据需求选择对应的选项生成文章</span>

                            <h3 class="timeline-header"><a href="#">生成选项 |</a> create options</h3>

                            <div class="timeline-body">
                                <div class="form-group col-md-12">
                                    {{Form::label('brandname', '品牌名称', array('class' => 'control-label col-md-1'))}}
                                    <div class="input-group col-md-4">
                                        <div class="input-group-addon"><i class="fa fa-user" style="width:10px;"></i></div>
                                        {{Form::text('brandname',null, array('class' => 'form-control  pull-right','id'=>'brandname','placeholder'=>'品牌名称','required'=>'required'))}}
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    {{Form::label('typeid', '行业分类', array('class' => 'control-label col-md-1'))}}
                                    <div class="input-group col-md-4">
                                        <div class="input-group-addon">
                                            <i class="fa fa-cubes" style="width:10px;"></i>
                                        </div>
                                        {{Form::select('typeid', $articlecategorys, null,array('class'=>'form-control pull-right select2 ','style'=>'width: 100%','required'=>'required'))}}
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    {{Form::label('title_typeid', '标题分类', array('class' => 'control-label col-md-1'))}}
                                    <div class="input-group col-md-4">
                                        <div class="input-group-addon">
                                            <i class="fa fa-language" style="width:10px;"></i>
                                        </div>
                                        {{Form::select('title_typeid', $titleTypes, null,array('class'=>'form-control pull-right select2','style'=>'width: 100%','required'=>'required'))}}
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
                                <div class="form-group col-md-12 basic_info">
                                    <label class="col-md-1  control-label">推送站点</label>
                                    <div class="checkbox" style="margin-top: 0px;">
                                        @foreach($websites as $site)
                                            @if($website==$site->id)
                                                {{Form::radio('website', $site->id, true,array('class'=>'flat-red','required'=>'required'))}} {{$site->webname}}
                                            @else
                                                {{Form::radio('website', $site->id, false,array('class'=>'flat-red','required'=>'required'))}} {{$site->webname}}
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="timeline-footer" style="clear: both;">
                                <button class="btn btn-primary btn-sm">重新生成</button>
                            </div>
                        </div>

                    </li>
                    <li>
                        <i class="fa fa-clock-o bg-gray"></i>
                    </li>
                </ul>
            </div>
            <!-- /.col -->
            {!! Form::close() !!}

            {{Form::open(array('route' =>array('articlepush'),'method' => 'post','files' => false,'id'=>'formsubmit','onsubmit'=>"return false;"))}}
            <div class="col-md-12">
                <!-- The time line -->
                <ul class="timeline">
                    <!-- timeline time label -->
                    <!-- /.timeline-label -->
                    <!-- timeline item -->
                    <li>
                        <i class="fa fa-comments bg-yellow"></i>

                        <div class="timeline-item">
                            <span class="time"><i class="fa fa-wrench"></i> 站点内容属性信息完善</span>

                            <h3 class="timeline-header"><a href="#">站点信息完善</a> 完善对应站点SEO信息</h3>

                            <div class="timeline-body">
                                <div class="form-group col-md-12">
                                    {{Form::label('title', '文档标题', array('class' => 'control-label col-md-1'))}}
                                    <div class="input-group col-md-4">
                                        <div class="input-group-addon"><i class="fa fa-eye-slash" style="width:10px;"></i></div>
                                        {{Form::text('title',null, array('class' => 'form-control  pull-right','id'=>'title','placeholder'=>'请输入文档标题','required'=>'required|'))}}
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    {{Form::label('keywords', '文档关键字', array('class' => 'control-label col-md-1'))}}
                                    <div class="input-group col-md-4">
                                        <div class="input-group-addon"><i class="fa fa-file-powerpoint-o" style="width:10px;"></i></div>
                                        {{Form::text('keywords',null, array('class' => 'form-control  pull-right','id'=>'keywords','placeholder'=>'请输入文档关键字,使用,分割','required'=>'required'))}}
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    {{Form::label('brandcid', '品牌所属大类', array('class' => 'col-md-1 control-label'))}}
                                    <div class="input-group col-md-4">
                                        <div class="input-group-addon">
                                            <i class="fa fa-cogs" style="width:10px;"></i>
                                        </div>
                                        {{Form::select('brandcid', [], null,array('class'=>'form-control  pull-right select2' ,'id'=>'brandcid','style'=>'width: 100%','required'=>'required'))}}
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    {{Form::label('brandtypeid', '品牌所属子类', array('class' => 'col-md-1 control-label'))}}
                                    <div class="input-group col-md-4">
                                        <div class="input-group-addon">
                                            <i class="fa fa-cog" style="width:10px;"></i>
                                        </div>
                                        {{Form::select('brandtypeid', [], null,array('class'=>'form-control  pull-right select2' ,'id'=>'brandtypeid','style'=>'width: 100%','required'=>'required'))}}
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    {{Form::label('brandid', '文档所属品牌', array('class' => 'col-md-1 control-label'))}}
                                    <div class="input-group col-md-4">
                                        <div class="input-group-addon">
                                            <i class="fa fa-flag-checkered" style="width:10px;"></i>
                                        </div>
                                        {{Form::select('brandid', [], null,array('class'=>'form-control  pull-right select2' ,'id'=>'brandid','style'=>'width: 100%','required'=>'required'))}}
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    {{Form::label('articletypeid', '文档所属分类', array('class' => 'col-md-1 control-label'))}}
                                    <div class="input-group col-md-4">
                                        <div class="input-group-addon">
                                            <i class="fa fa-language" style="width:10px;"></i>
                                        </div>
                                        {{Form::select('articletypeid', [], null,array('class'=>'form-control  pull-right select2' ,'id'=>'articletypeid','style'=>'width: 100%','required'=>'required'))}}
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    {{Form::label('description', '文档描述', array('class' => 'control-label col-md-1'))}}
                                    <div class="input-group  col-md-4">
                                        <div class="input-group-addon">
                                            <i class="fa fa-area-chart" style="width:10px;"></i>
                                        </div>
                                        {{Form::textarea('description',null, array('class' => 'form-control pull-right','id'=>'desrciption','rows'=>1,'placeholder'=>'不填写将自动提取首段'))}}
                                        {{Form::hidden('webname', null, array('class' => 'form-control col-md-10','id'=>'webname','required'=>'required'))}}
                                    </div>
                                </div>
                                <div class="form-group col-md-12 ">
                                    {{Form::label('published_at', '预选发布时间', array('class' => 'control-label col-md-1'))}}
                                    <div class="input-group date  col-md-4">
                                        <div class="input-group-addon">
                                            <i class="fa fa-clock-o"></i>
                                        </div>
                                        {{Form::text('published_at', \Carbon\Carbon::now(), array('class' => 'form-control pull-right','id'=>'datepicker','placeholder'=>'点击选择时间',"autocomplete"=>"off"))}}
                                    </div>
                                </div>
                            </div>
                            <div class="timeline-footer">

                            </div>
                            <div class="timeline-footer" style="clear: both;">
                                <button id="submit_content" class="btn btn-success btn-sm" >推送至指定站点</button>
                            </div>
                        </div>
                    </li>
                    <!-- END timeline item -->
                    <li>
                        <i class="fa fa-camera bg-purple"></i>
                        <div class="timeline-item">
                            <span class="time"><i class="fa fa-bell-slash-o"></i> 根据需要复制对应图片到编辑器</span>
                            <h3 class="timeline-header"><a href="#">当前品牌</a> 图集内容列表</h3>
                            <div class="timeline-body" id="brandpics">
                            </div>
                        </div>
                    </li>
                    <li>
                        <i class="fa fa-file-text bg-maroon"></i>
                        <div class="timeline-item">
                            <span class="time"><i class="fa fa-bell-o"></i> 生成结果预览 无问题后推送到指定站点</span>
                            <h3 class="timeline-header"><a href="#">文档生成处理</a></h3>
                            <div class="timeline-body">
                                @include('admin.layouts.ueditor')
                            <!-- 编辑器容器 -->
                                <script id="container" name="body" type="text/plain" >
                                    @include('admin.layouts.content')
                                </script>
                            </div>
                            <div id="errors">
                                @if(count($errors) > 0)
                                    <ul class="alert alert-danger">
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                @endif
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
        <!-- /.row -->
    </section>

@stop
@section('libs')
    <!-- iCheck -->
    <script src="/adminlte/plugins/iCheck/icheck.min.js"></script>
    <script src="/adminlte/plugins/select2/select2.full.min.js"></script>
    <script src="/adminlte/plugins/select2/i18n/zh-CN.js"></script>
    <script src="/adminlte/validator.js"></script>
    <script src="/adminlte/plugins/datepicker/bootstrap-datepicker.js"></script>
    <script src="/adminlte/plugins/datepicker/locales/bootstrap-datepicker.zh-CN.js"></script>
    <script>
        $(function () {
            $('.basic_info input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({ checkboxClass: 'icheckbox_flat-green', radioClass: 'iradio_flat-green'});
            $('#datepicker').datepicker({autoclose: true,language: 'zh-CN',todayHighlight: true });
            getCurrentCidinfo();
            getNavs()
            $('.select2').select2({language: "zh-CN"});
            $("#webname").val($("input[type='radio']:checked").val())
            $("#brandcid").on("change",function(){getsonTypes("/website/getsontypes",{"topid":$("#brandcid").select2("val"),"website":$("input[type='radio']:checked").val()},"#brandtypeid")});
            $("#brandtypeid").on("change",function(){getBdname('/website/getbdname',{"brandtypeid":$("#brandtypeid").select2("val"),"website":$("input[type='radio']:checked").val()},"#brandid")});
            $("#brandid").on("change",function(){getBrandpics('/website/getbrandpic',{"brandid":$("#brandid").select2("val"),"website":$("input[type='radio']:checked").val()},"#brandpics")});
            $('input[type="radio"].flat-red').on('ifChecked', function(){
                $("#webname").val($("input[type='radio']:checked").val())
                getCurrentCidinfo();
                getNavs()
                $("#brandcid").on("change",function(){getsonTypes("/website/getsontypes",{"topid":$("#brandcid").select2("val"),"website":$("input[type='radio']:checked").val()},"#brandtypeid")});
                $("#brandtypeid").on("change",function(){getBdname('/website/getbdname',{"brandtypeid":$("#brandtypeid").select2("val"),"website":$("input[type='radio']:checked").val()},"#brandid")});
                $("#brandid").on("change",function(){getBrandpics('/website/getbrandpic',{"brandid":$("#brandid").select2("val"),"website":$("input[type='radio']:checked").val()},"#brandpics")});
            });
        })
        //获取默认站点下品牌顶级分类信息
        function getCurrentCidinfo() {
            $.ajax(
                {type:"POST",url:'/website/gettidinfo',data:{"website":$("input[type='radio']:checked").val()},
                    datatype: "json",
                    success:function (response) {
                        var contents='';
                        for (type in response) {
                            contents += '<option value="' + response[type]['id'] + '">' + response[type]['typename'] + '</option>';
                        }
                        $('#brandcid').html(contents);
                        //console.log($("#brandcid").select2("val"))
                        getsonTypes("/website/getsontypes",{"topid":$("#brandcid").select2("val"),"website":$("input[type='radio']:checked").val()},"#brandtypeid");
                    }
                });
        }
        //获取顶级分类下子类
        function getsonTypes(url,datas,element)
        {
            $.ajax(
                {type:"POST",url:url,data:datas,
                    datatype: "json",
                    success:function (response) {
                        var contents='';
                        for (type in response) {
                            contents += '<option value="' + response[type]['id']  + '">' + response[type]['typename'] + '</option>';
                        }
                        $(element).html(contents);
                        getBdname('/website/getbdname',{"brandtypeid":$("#brandtypeid").select2("val"),"website":$("input[type='radio']:checked").val()},"#brandid")
                    }
                });
        }
        //获取对应品牌分类下品牌名称
        function getBdname(url,datas,element)
        {
            $.ajax(
                {type:"POST",url:url,data:datas,
                    datatype: "json",
                    success:function (response) {
                        var contents='';
                        for (type in response) {
                            contents += '<option value="' +  response[type]['id'] + '">' + response[type]['brandname'] + '</option>';
                        }
                        $(element).html(contents);
                        getBrandpics('/website/getbrandpic',{"brandid":$("#brandid").select2("val"),"website":$("input[type='radio']:checked").val()},"#brandpics")
                    }
                });
        }
        //获取指定站点普通文档分类
        function getNavs() {
            $.ajax(
                {type:"POST",url:'/website/getnavsinfo',data:{"website":$("input[type='radio']:checked").val()},
                    datatype: "json",
                    success:function (response) {
                        var contents='';
                        for (type in response) {
                            console.log()
                            contents += '<option value="' + response[type]['id'] + '">' + response[type]['typename'] + '</option>';
                        }
                        $('#articletypeid').html(contents);
                    }
                });
        }

        //获取指定品牌文档图集内容
        function getBrandpics(url,datas,element){
            $.ajax(
                {type:"POST",url:url,data:datas,
                    datatype: "json",
                    success:function (response) {
                        var contents='';
                        for (type in response) {
                            contents += '<img style="width: 150px; height: 100px; border-radius: 5px;" src="'+response[type]+'"  class="margin">';
                        }
                        $(element).html(contents);
                    }
                });
        }


        //文档推送
        $('#formsubmit').submit(function(e) {
            e.preventDefault();
            $.ajax(
                {
                    type:"POST",
                    url:'/website/article/push',
                    data:{
                        "title":$("#title").val(),
                        "brandcid":$("#brandcid").select2("val"),
                        "brandtypeid":$("#brandtypeid").select2("val"),
                        "brandid":$("#brandid").select2("val"),
                        "articletypeid":$("#articletypeid").select2("val"),
                        "description":$("#description").val(),
                        "keywords":$("#keywords").val(),
                        "published_at":$("#published_at").val(),
                        "webname":$("#webname").val(),
                        "body":ue.getContent()
                    },
                    datatype: "json",
                    success:function (response) {
                        $("#title").val('');
                        $("#keywords").val('');
                        ue.setContent('')
                        alert(response)
                        return false;
                    }
                });
            return false
        });

    </script>
@stop

