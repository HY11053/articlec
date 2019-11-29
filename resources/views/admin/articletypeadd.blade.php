@extends('admin.layouts.admin_app')
@section('title')行业分类添加@stop
@section('head')
    <link href="/adminlte/plugins/iCheck/all.css" rel="stylesheet">
    <link href="/adminlte/plugins/iCheck/flat/green.css" rel="stylesheet">
    <style>.red{color: red;}</style>
@stop
@section('header_position')
    <section class="content-header">
        <h1>ArticleTypeyadd<small>ArticleType Add</small></h1>
        <ol class="breadcrumb"><li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li><li class="active">ArticleTypeyadd</li></ol>
    </section>
@stop
@section('content')
    <div class="register-box">
        <div class="register-logo">
            <b>内容分类添加</b>
        </div>
        <div class="register-box-body">
            <p class="login-box-msg">添加对应内容分类</p>
            {{Form::open(array('route' => 'articletypeadd','files' => false))}}
            <div class="form-group">
                {{Form::text('content_type', null, array('class' => 'form-control','id'=>'title','placeholder'=>'内容分类名称',"required"=>"required","autocomplete"=>"off"))}}
            </div>
            <button type="submit" class="btn btn-primary block full-width m-b">添加内容分类</button>
            {!! Form::close() !!}
        </div>
        <!-- /.form-box -->
    </div>
@stop


