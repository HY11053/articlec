@extends('admin.layouts.admin_app')
@section('title')内容分类修改@stop
@section('head')
    <link href="/adminlte/plugins/iCheck/all.css" rel="stylesheet">
    <link href="/adminlte/plugins/iCheck/flat/green.css" rel="stylesheet">
    <style>.red{color: red;}</style>
@stop
@section('header_position')
    <section class="content-header">
        <h1>ArticleType Edit<small>Article Type  Edit</small></h1>
        <ol class="breadcrumb"><li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li><li class="active">ArticleTypeEdit</li></ol>
    </section>
@stop
@section('content')
    <div class="register-box">
        <div class="register-logo">
            <b>内容分类编辑</b>
        </div>
        <div class="register-box-body">
            <p class="login-box-msg">编辑对应内容分类</p>
            {{Form::model($thisarticletype,array('route' =>array( 'articletypeedit','id'=>$id),'method' => 'put','files' => false,))}}
            <div class="form-group">
                {{Form::text('content_type', null, array('class' => 'form-control','id'=>'content_type','placeholder'=>'内容名称',"required"=>"required","autocomplete"=>"off"))}}
            </div>
            <div class="form-group">
                {{Form::text('sortrank', null, array('class' => 'form-control','id'=>'sortrank','placeholder'=>'内容分类排序',"required"=>"required","autocomplete"=>"off"))}}
            </div>
            <button type="submit" class="btn btn-primary block full-width m-b">更改内容分类</button>
            {!! Form::close() !!}
        </div>
        <!-- /.form-box -->
    </div>
@stop


