@extends('admin.layouts.admin_app')
@section('title')绑定站点信息修改@stop
@section('head')
    <link href="/adminlte/plugins/iCheck/all.css" rel="stylesheet">
    <link href="/adminlte/plugins/iCheck/flat/green.css" rel="stylesheet">
    <style>.red{color: red;}</style>
@stop
@section('header_position')
    <section class="content-header">
        <h1>website edit<small>website edit</small></h1>
        <ol class="breadcrumb"><li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li><li class="active">website edit</li></ol>
    </section>
@stop
@section('content')
    <div class="register-box">
        <div class="register-logo">
            <b>绑定站点信息修改</b>
        </div>
        <div class="register-box-body">
            <p class="login-box-msg">绑定站点信息修改</p>
            {{Form::model($thiswebiste,array('route' =>array( 'postwebsiteedit','id'=>$thiswebiste->id),'method' => 'put','files' => false,))}}
            <div class="form-group">
                {{Form::text('webname', null, array('class' => 'form-control','id'=>'title','placeholder'=>'网站名称',"required"=>"required","autocomplete"=>"off"))}}

            </div>
            <div class="form-group">
                {{Form::text('weburl', null, array('class' => 'form-control','id'=>'title','placeholder'=>'网站域名',"required"=>"required","autocomplete"=>"off"))}}
            </div>
            <button type="submit" class="btn btn-primary block full-width m-b">更改站点</button>
            {!! Form::close() !!}
        </div>
        <!-- /.form-box -->
    </div>
@stop


