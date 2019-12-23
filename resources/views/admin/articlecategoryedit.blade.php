@extends('admin.layouts.admin_app')
@section('title')行业分类修改@stop
@section('head')
    <link href="/adminlte/plugins/iCheck/all.css" rel="stylesheet">
    <link href="/adminlte/plugins/iCheck/flat/green.css" rel="stylesheet">
    <style>.red{color: red;}</style>
@stop
@section('header_position')
    <section class="content-header">
        <h1>ArticleCategoryadd<small>Article Category Edit</small></h1>
        <ol class="breadcrumb"><li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li><li class="active">ArticleCategoryEdit</li></ol>
    </section>
@stop
@section('content')
    <div class="register-box">
        <div class="register-logo">
            <b>行业分类编辑</b>
        </div>
        <div class="register-box-body">
            <p class="login-box-msg">编辑对应行业分类</p>
            {{Form::model($thisarticlecategory,array('route' =>array( 'paymengcategoryedit','id'=>$id),'method' => 'put','files' => false,))}}
            <div class="form-group">
                {{Form::text('typename', null, array('class' => 'form-control','id'=>'title','placeholder'=>'行业名称',"required"=>"required","autocomplete"=>"off"))}}
            </div>
            <button type="submit" class="btn btn-primary block full-width m-b">更改行业分类</button>
            {!! Form::close() !!}
        </div>
        <!-- /.form-box -->
    </div>
@stop


