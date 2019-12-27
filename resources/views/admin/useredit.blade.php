@extends('admin.layouts.admin_app')
@section('title')用户列表管理@stop
@section('head')
    <link href="/adminlte/plugins/iCheck/all.css" rel="stylesheet">
    <link href="/adminlte/plugins/iCheck/flat/green.css" rel="stylesheet">
@stop
@section('header_position')
    <section class="content-header">
        <h1>Article Lists<small>Article  Lists</small></h1>
        <ol class="breadcrumb"><li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li><li class="active">Article Lists</li></ol>
    </section>
@stop
@section('content')
    <div class="register-box">
        <div class="register-box-body">
            <p class="login-box-msg">后台用户注册</p>
            {!! Form::model($thisUser,array('action' =>array('UserController@Edit', $thisUser->id),'method' => 'put')) !!}
            <div class="form-group has-feedback">
                {{Form::text('name', null,array('class'=>'form-control','id'=>'name','readonly'=>'readonly','placeholder'=>'用户名'))}}
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                {{Form::text('email', null,array('class'=>'form-control','id'=>'email','readonly'=>'readonly','placeholder'=>'登陆邮箱'))}}
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback ">
                @if($thisUser->type)
                {{Form::radio('type', '1', true,array('class'=>'flat-red','checked'=>'checked','id'=>'type1'))}} 推送权限
                {{Form::radio('type', '0', false,array('class'=>'flat-red','id'=>'type0'))}}否
                @else
                    {{Form::radio('type', '1', true,array('class'=>'flat-red','id'=>'type1'))}} 推送权限
                    {{Form::radio('type', '0', false,array('class'=>'flat-red','checked'=>'checked','id'=>'type0'))}}否
                @endif
            </div>
            <div class="form-group has-feedback">
                {{Form::password('password', array('class'=>'form-control','id'=>'password','placeholder'=>'密码'))}}
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                {{Form::password('password_confirmation', array('class'=>'form-control','id'=>'password_confirmation','placeholder'=>'确认密码'))}}
                <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
            </div>

            <div class="row">
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">提交</button>
                </div>
                <!-- /.col -->
            </div>
            {!! Form::close() !!}
            @if(count($errors) > 0)
                <ul class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
        <!-- /.form-box -->
    </div>
    <!-- /.register-box -->
    <!-- /.row -->
    <!-- /.content -->
@stop
@section('libs')
    <script src="/adminlte/plugins/iCheck/icheck.min.js"></script>
    <script>
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({ checkboxClass: 'icheckbox_flat-green', radioClass: 'iradio_flat-green'});
    </script>
@stop


