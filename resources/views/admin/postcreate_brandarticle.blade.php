@extends('admin.layouts.admin_app')
@section('title')品牌文档生成@stop
@section('head')
    <link href="/adminlte/plugins/iCheck/all.css" rel="stylesheet">
    <link href="/adminlte/plugins/iCheck/flat/green.css" rel="stylesheet">
    <link href="/adminlte/plugins/select2/select2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/adminlte/plugins/datepicker/datepicker3.css">
    <link href="/adminlte/plugins/bootstrap-fileinput/css/fileinput.min.css" rel="stylesheet">
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
            {{Form::model($createinfo,array('route' =>array('brandarticlecreate'),'method' => 'post','files' => false,))}}
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
                                {{--<div class="form-group col-md-12">
                                    {{Form::label('title_typeid', '标题分类', array('class' => 'control-label col-md-1'))}}
                                    <div class="input-group col-md-4">
                                        <div class="input-group-addon">
                                            <i class="fa fa-language" style="width:10px;"></i>
                                        </div>
                                        {{Form::select('title_typeid', $titleTypes, null,array('class'=>'form-control pull-right select2','style'=>'width: 100%','required'=>'required'))}}
                                    </div>
                                </div>--}}
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
                                <div class="form-group col-md-12 basic_info" id="basic_info">
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
                                        {{Form::select('brandcid',  [], null,array('class'=>'form-control  pull-right select2' ,'id'=>'brandcid','style'=>'width: 100%','required'=>'required'))}}
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

                                <div class="form-group col-md-12 ">
                                    {{Form::label('ismake', '文章状态', array('class' => 'control-label col-md-1'))}}
                                    <div class="radio col-md-4">
                                        {{Form::radio('ismake', '1', true,array('class'=>'flat-red','checked'=>'checked'))}} 已审核
                                        {{Form::radio('ismake', '0', false,array('class'=>'flat-red'))}}未审核
                                    </div>
                                </div>
                                <div class="form-group col-md-12 has-warning">
                                    {{Form::label('xiongzhang', '熊掌号推送', array('class' => 'control-label col-md-1'))}}
                                    <div class="radio col-md-4">
                                        {{Form::radio('xiongzhang', '1', true,array('class'=>'flat-red'))}} 天级
                                        {{Form::radio('xiongzhang', '2', false,array('class'=>'flat-red'))}}周级
                                        {{Form::radio('xiongzhang', '0', false,array('class'=>'flat-red'))}}否
                                        <span class="help-block" ><i class="fa fa-bell-o"></i> 天级收录内容享受天级抓取校验、快速展现优待。周级收录接口，每天可提交最多500万条有价值的内容，所提交内容会进入百度搜索统一处理流程，这个过程需要一段时间</span>
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
                                <button class="btn btn-primary btn-sm"></button>
                            </div>
                        </div>
                    </li>
                    <!-- timeline item -->
                    <li>
                        <i class="fa fa-photo bg-aqua"></i>
                        <div class="timeline-item">
                            <span class="time"><i class="fa fa-clock-o"></i> {{date('D M j')}}</span>
                            <h3 class="timeline-header no-border"><a href="#">缩略图处理</a> 图片上传</h3>
                            <div class="timeline-body">
                                {{Form::file('image', array('class' => 'file col-md-10','id'=>'input-2','data-show-upload'=>"false",'data-show-caption'=>"true",'accept'=>'image/*'))}}
                            </div>
                        </div>
                    </li>
                    <!-- END timeline item -->
                    <!-- timeline item -->
                    <li>
                        <i class="fa fa-user bg-yellow"></i>

                        <div class="timeline-item">
                            <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>

                            <h3 class="timeline-header"><a href="#">产品信息</a> 产品信息描述</h3>

                            <div class="timeline-body">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        {{Form::label('brandname', '品牌名称', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                                        <div class="col-md-8 col-sm-9 col-xs-12">
                                            {{Form::text('brandname',null, array('class' => 'form-control col-md-10','id'=>'brandname','placeholder'=>'品牌名称','required'=>'required'))}}
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        {{Form::label('brandtime', '成立时间', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                                        <div class="col-md-8 col-sm-9 col-xs-12">
                                            {{Form::text('brandtime', null, array('class' => 'form-control col-md-10','id'=>'brandtime','placeholder'=>'1970-1-1'))}}
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        {{Form::label('brandorigin', '品牌发源地', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                                        <div class="col-md-8 col-sm-9 col-xs-12">
                                            {{Form::text('brandorigin', null, array('class' => 'form-control col-md-10','id'=>'brandorigin','placeholder'=>'品牌发源地'))}}
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        {{Form::label('brandnum', '门店总数', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                                        <div class="col-md-8 col-sm-9 col-xs-12">
                                            {{Form::text('brandnum', rand(50,500), array('class' => 'form-control col-md-10','id'=>'brandnum','placeholder'=>'门店总数'))}}
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6 ">
                                        {{Form::label('tzid', '店面投资', array('class' => 'col-sm-2 control-label'))}}
                                        <div class="col-md-8 col-sm-9 col-xs-12">
                                            {{Form::select('tzid', [], null,array('class'=>'form-control select2'))}}
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        {{Form::label('brandpay', '投资金额', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                                        <div class="col-md-8 col-sm-9 col-xs-12">
                                            {{Form::text('brandpay', null, array('class' => 'form-control col-md-10','id'=>'brandpay','placeholder'=>'请填写实际投资金额区间'))}}
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        {{Form::label('brandarea', '加盟区域', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                                        <div class="col-md-8 col-sm-9 col-xs-12">
                                            {{Form::text('brandarea', null, array('class' => 'form-control col-md-10','id'=>'brandarea','placeholder'=>'加盟区域'))}}
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        {{Form::label('brandmap', '经营范围', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                                        <div class="col-md-8 col-sm-9 col-xs-12">
                                            {{Form::text('brandmap', null, array('class' => 'form-control col-md-10','id'=>'brandmap','placeholder'=>'经营范围'))}}
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        {{Form::label('brandperson', '加盟人群', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                                        <div class="col-md-8 col-sm-9 col-xs-12">
                                            {{Form::text('brandperson', null, array('class' => 'form-control col-md-10','id'=>'brandmap','placeholder'=>'加盟人群'))}}
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        {{Form::label('brandattch', '加盟意向人数', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                                        <div class="col-md-8 col-sm-9 col-xs-12">
                                            {{Form::text('brandattch', rand(1000,3000), array('class' => 'form-control col-md-10','id'=>'brandattch','placeholder'=>'加盟意向人数'))}}
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        {{Form::label('brandapply', '申请加盟人数', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                                        <div class="col-md-8 col-sm-9 col-xs-12">
                                            {{Form::text('brandapply', rand(2000,5000), array('class' => 'form-control col-md-10','id'=>'brandapply','placeholder'=>'申请加盟人数'))}}
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        {{Form::label('brandchat', '项目咨询人数', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                                        <div class="col-md-8 col-sm-9 col-xs-12">
                                            {{Form::text('brandchat', rand(500,1000), array('class' => 'form-control col-md-10','id'=>'brandchat','placeholder'=>'项目咨询人数'))}}
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        {{Form::label('brandgroup', '公司名称', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                                        <div class="col-md-8 col-sm-9 col-xs-12">
                                            {{Form::text('brandgroup', null, array('class' => 'form-control col-md-10','id'=>'brandgroup','placeholder'=>'公司名称'))}}
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        {{Form::label('brandaddr', '公司地址', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                                        <div class="col-md-8 col-sm-9 col-xs-12">
                                            {{Form::text('brandaddr', null, array('class' => 'form-control col-md-10','id'=>'brandaddr','placeholder'=>'公司地址','required'=>'required'))}}
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        {{Form::label('genre', '公司性质', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                                        <div class="col-md-8 col-sm-9 col-xs-12">
                                            {{Form::text('genre', null, array('class' => 'form-control col-md-10','id'=>'genre','placeholder'=>'公司性质'))}}
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 ">
                                        {{Form::label('acreage', '所需面积', array('class' => 'col-sm-2 control-label'))}}
                                        <div class="col-md-8 col-sm-9 col-xs-12">
                                            {{Form::select('acreage', [], null,array('class'=>'form-control select2'))}}
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        {{Form::label('brandduty', '是否区域授权', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                                        <div class="col-md-8 col-sm-9 col-xs-12">
                                            {{Form::text('brandduty', null, array('class' => 'form-control col-md-10','id'=>'brandduty','placeholder'=>'是否区域授权'))}}
                                            {{Form::hidden('mid', '1', array('class' => 'form-control col-md-10','id'=>'mid'))}}
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        {{Form::label('registeredcapital', '注册资金', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                                        <div class="col-md-8 col-sm-9 col-xs-12">
                                            {{Form::text('registeredcapital', null, array('class' => 'form-control col-md-10','id'=>'registeredcapital','placeholder'=>'注册资金'))}}
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="timeline-footer">
                                <a class="btn btn-warning btn-flat btn-xs">View comment</a>
                            </div>
                        </div>
                    </li>
                    <!-- END timeline item -->
                    <!-- timeline item -->
                    <li>
                        <i class="fa   fa-recycle bg-yellow"></i>

                        <div class="timeline-item">
                            <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>

                            <h3 class="timeline-header"><a href="#">店铺成本</a> 店铺各项成本开支</h3>

                            <div class="timeline-body">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        {{Form::label('decorationpay', '装修费用', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                                        <div class="col-md-8 col-sm-9 col-xs-12">
                                            {{Form::text('decorationpay',mt_rand (20000,50000), array('class' => 'form-control col-md-10','id'=>'decorationpay','placeholder'=>'装修费用'))}}
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        {{Form::label('quartersrent', '前两季度房租', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                                        <div class="col-md-8 col-sm-9 col-xs-12">
                                            {{Form::text('quartersrent', mt_rand (2000,5000), array('class' => 'form-control col-md-10','id'=>'quartersrent','placeholder'=>'前两季度房租'))}}
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        {{Form::label('equipmentcost', '铺货/设备费用', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                                        <div class="col-md-8 col-sm-9 col-xs-12">
                                            {{Form::text('equipmentcost', mt_rand (10000,20000), array('class' => 'form-control col-md-10','id'=>'equipmentcost','placeholder'=>'铺货/设备费用'))}}
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        {{Form::label('workingcapital', '流动资金', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                                        <div class="col-md-8 col-sm-9 col-xs-12">
                                            {{Form::text('workingcapital', 20000, array('class' => 'form-control col-md-10','id'=>'workingcapital','placeholder'=>'流动资金'))}}
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        {{Form::label('laborquarter', '人工开支', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                                        <div class="col-md-8 col-sm-9 col-xs-12">
                                            {{Form::text('laborquarter', mt_rand (2000,5000), array('class' => 'form-control col-md-10','id'=>'laborquarter','placeholder'=>'一季度人工开支'))}}
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        {{Form::label('miscellaneous', '工商税务杂项', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                                        <div class="col-md-8 col-sm-9 col-xs-12">
                                            {{Form::text('miscellaneous', mt_rand (2000,5000), array('class' => 'form-control col-md-10','id'=>'miscellaneous','placeholder'=>'工商税务杂项'))}}
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        {{Form::label('dailyvolume', '日成交量', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                                        <div class="col-md-8 col-sm-9 col-xs-12">
                                            {{Form::text('dailyvolume', mt_rand (80,100), array('class' => 'form-control col-md-10','id'=>'dailyvolume','placeholder'=>'日成交量'))}}
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        {{Form::label('unitprice', '平均单价', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                                        <div class="col-md-8 col-sm-9 col-xs-12">
                                            {{Form::text('unitprice', mt_rand (50,100), array('class' => 'form-control col-md-10','id'=>'unitprice','placeholder'=>'平均单价'))}}
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        {{Form::label('watercoal', '水电煤(元/月)', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                                        <div class="col-md-8 col-sm-9 col-xs-12">
                                            {{Form::text('watercoal', mt_rand (200,500), array('class' => 'form-control col-md-10','id'=>'watercoal','placeholder'=>'水电煤(元/月)'))}}
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="timeline-footer">
                                <a class="btn btn-warning btn-flat btn-xs">View comment</a>
                            </div>
                        </div>
                    </li>
                    <!-- END timeline item -->
                    <!-- timeline time label -->
                    <li class="time-label">
                  <span class="bg-green">
                   {{date("M j, Y")}}
                  </span>
                    </li>
                    <!-- /.timeline-label -->
                    <!-- timeline item -->
                    <li>
                        <i class="fa fa-camera bg-purple"></i>

                        <div class="timeline-item">
                            <span class="time"><i class="fa fa-clock-o"></i> {{date('j, n,y')}}</span>

                            <h3 class="timeline-header"><a href="#">图集处理</a> 批量上传图集</h3>
                            <div class="timeline-body">
                                {{Form::file('image', array('name'=>'input-image','class' => 'file-loading','id'=>'input-image-1','multiple','accept'=>'image/*'))}}
                                <div id="kv-success-modal" class="modal fade">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title">Yippee!</h4>
                                            </div>
                                            <div id="kv-success-box" class="modal-body">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{Form::hidden('imagepics', null,array('id'=>'imagepics'))}}
                            </div>
                        </div>
                    </li>
                    <!-- END timeline item -->
                    <!-- END timeline item -->
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
                            <div class="timeline-footer" style="clear: both;">
                                <button id="submit_content" class="btn btn-success btn-sm" >推送至指定站点</button>
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
    <!-- Button trigger modal -->
    <button type="button" style="display: none" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
        Launch demo modal
    </button>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">发布信息状态提示</h4>
                </div>
                <div class="modal-body" id="modal-body">
                    <p></p>
                </div>
                <div class="modal-footer">
                    <button  type="button" class="btn btn-primary" data-dismiss="modal">关闭</button>
                </div>
            </div>
        </div>
    </div>
@stop
@section('libs')
    <!-- iCheck -->
    <script src="/adminlte/plugins/iCheck/icheck.min.js"></script>
    <script src="/adminlte/plugins/select2/select2.full.min.js"></script>
    <script src="/adminlte/plugins/select2/i18n/zh-CN.js"></script>
    <script src="/adminlte/validator.js"></script>
    <script src="/adminlte/plugins/datepicker/bootstrap-datepicker.js"></script>
    <script src="/adminlte/plugins/datepicker/locales/bootstrap-datepicker.zh-CN.js"></script>
    <script src="/adminlte/plugins/bootstrap-fileinput/js/fileinput.min.js"></script>
    <script src="/adminlte/plugins/bootstrap-fileinput/js/locales/zh.js"></script>
    <script>
        $(function () {
            $('.basic_info input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({ checkboxClass: 'icheckbox_flat-green', radioClass: 'iradio_flat-green'});
            $('#datepicker').datepicker({autoclose: true,language: 'zh-CN',todayHighlight: true });
            $('.select2').select2({language: "zh-CN"});
            $("#webname").val($("input[type='radio']:checked").val())
            getCurrentCidinfo();
            $("#brandcid").on("change",function(){getsonTypes("/website/getsontypes",{"topid":$("#brandcid").select2("val"),"website":$("input[type='radio']:checked").val()},"#brandtypeid")});
            $('#basic_info input[type="radio"].flat-red').on('ifChecked', function(){
                $("#webname").val($("input[type='radio']:checked").val())
                getCurrentCidinfo();
                $("#brandcid").on("change",function(){getsonTypes("/website/getsontypes",{"topid":$("#brandcid").select2("val"),"website":$("input[type='radio']:checked").val()},"#brandtypeid")});
            });
            $("#input-image-1").fileinput({
                theme: 'fa',
                uploadUrl: "/admin/upload/images",
                allowedFileExtensions: ["jpg", "png", "gif",'jpeg'],
                maxImageWidth: 1000,
                minFileCount: 1,
                maxFileCount: 6,
                language: 'zh',
                overwriteInitial: false,
                resizeImage: true,
                initialPreviewAsData: true,
            }).on('fileuploaded', function(e, params) {
                $('#kv-success-box').html('上传成功！');
                $('#kv-success-modal').modal('show');
                $('.kv-file-remove').hide();
                $("#imagepics").val($("#imagepics").val()+params.response.link+',');
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
                            contents += '<option value="' + type + '">' + response[type] + '</option>';
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
                            contents += '<option value="' + type + '">' + response[type] + '</option>';
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
                    url:'/website/brandarticle/push',
                    data:{
                        "title":$("#title").val(),
                        "brandtypeid":$("#brandtypeid").select2("val"),
                        "description":$("#description").val(),
                        "keywords":$("#keywords").val(),
                        "published_at":$("#datepicker").val(),
                        "webname":$("#webname").val(),
                        "ismake": $('input[name="ismake"]:checked').val(),
                        "xiongzhang": $('input[name="xiongzhang"]:checked').val(),
                        "body":ue.getContent()
                    },
                    datatype: "json",
                    success:function (response) {
                        $("#title").val('');
                        $("#keywords").val('');
                        ue.setContent('')
                        $("#modal-body").html(response)
                        $('#myModal').modal()
                        return false;
                    }
                });
            return false
        });

    </script>
@stop

