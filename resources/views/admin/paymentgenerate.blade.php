@extends('admin.layouts.admin_app')
@section('title')加盟费用生成@stop
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
        <h1>Article Generate<small>Article Generate submit</small></h1>
        <ol class="breadcrumb"><li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li><li class="active">Article Generate </li></ol>
    </section>
@stop
@section('content')
    <section class="content" id="paymentgenerateapp">
        <!-- row -->
        <div class="row">
            {{Form::open(array('route' =>array('paymentgenerate'),'method' => 'post','files' => false,))}}
            <div class="col-md-12">
                <!-- The time line -->
                <ul class="timeline">
                    <!-- timeline time label -->
                    <li class="time-label">
                  <span class="bg-red">
                    payment generate
                  </span>
                    </li>
                    <!-- /.timeline-label -->
                    <!-- timeline item -->
                    <li>
                        <i class="fa fa-user bg-aqua"></i>
                        <div class="timeline-item">
                            <span class="time"><i class="fa fa-bell-o"></i> 根据需求选择对应的选项生成加盟费用</span>

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
                                        {{Form::select('typeid', $paymentnavs, null,array('class'=>'form-control pull-right select2 ','style'=>'width: 100%','required'=>'required'))}}
                                    </div>
                                </div>
                            </div>
                            <div class="timeline-footer" style="clear: both;">
                                <button class="btn btn-primary btn-sm">重新生成</button>
                            </div>
                        </div>
                    </li>
                    <li>
                        <i class="fa   fa-recycle bg-yellow"></i>

                        <div class="timeline-item">
                            <span class="time"><i class="fa fa-file-text-o"></i> 当前品牌相关资讯，按需截取内容</span>

                            <h3 class="timeline-header">加盟费用字段数值修改</h3>

                            <div class="timeline-body" id="collectcontent">
                               @if(isset($paymentinfos))
                                    @foreach($paymentinfos as $paymentinfo)
                                        <div class="form-group col-md-6">
                                            {{Form::label(app('pinyin')->abbr($paymentinfo), $paymentinfo, array('class' => 'control-label col-md-2'))}}
                                            <div class="input-group col-md-10">
                                                <div class="input-group-addon"><i class="fa fa-recycle" style="width:10px;"></i></div>
                                                {{Form::number(app('pinyin')->abbr($paymentinfo),null, array('class' => 'form-control  pull-right','id'=>app('pinyin')->abbr($paymentinfo),'placeholder'=>'填入对应数值','v-model'=>app('pinyin')->abbr($paymentinfo)))}}
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            <div class="timeline-footer clear">
                                <a class="btn btn-primary btn-sm" id="regencollect">重新生成</a>
                            </div>
                        </div>
                    </li>

                    <li>
                        <i class="fa   fa-recycle bg-yellow"></i>

                        <div class="timeline-item">
                            <span class="time"><i class="fa fa-file-text-o"></i> 加盟费用生成结果样式预览</span>

                            <h3 class="timeline-header">加盟费用生成结果样式预览</h3>

                            <div class="timeline-body" id="collectcontent">
                                <div class="timeline-body">
                                    <table class="table table-hover  table-responsive table-bordered">
                                        <tbody>
                                        <tr>
                                            <th>费用支出</th>
                                            <th>一线城市</th>
                                            <th>二线城市</th>
                                            <th>县级城市</th>
                                        </tr>
                                            <tr >
                                                <td>{{$paymentinfo}}</td>
                                                <td>{{ app('pinyin')->abbr($paymentinfo) }}</td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        <tr>
                                            <td>总投资费用</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="timeline-footer">
                                <a class="btn btn-primary btn-sm" id="regencollect">复制生成结果</a>
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
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script>
        $(function () {
            $('.basic_info input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({ checkboxClass: 'icheckbox_flat-green', radioClass: 'iradio_flat-green'});
            $('.select2').select2({language: "zh-CN"});
        })
    </script>

    <script>
        var app =new Vue({
            el:'#paymentgenerateapp',
            data:{
                @foreach($paymentinfos as $paymentinfo)
                @if(!$loop->last)
                {{app('pinyin')->abbr($paymentinfo)}}:'{{$paymentinfo}}',
                @else
                {{app('pinyin')->abbr($paymentinfo)}}:'{{$paymentinfo}}'
                @endif
                @endforeach
            }
        })
    </script>
@stop

