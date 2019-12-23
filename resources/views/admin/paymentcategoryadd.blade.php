@extends('admin.layouts.admin_app')
@section('title')加盟费用分类添加@stop
@section('head')
    <link href="/adminlte/plugins/iCheck/all.css" rel="stylesheet">
    <link href="/adminlte/plugins/iCheck/flat/green.css" rel="stylesheet">
    <style>.red{color: red;}</style>
@stop
@section('header_position')
    <section class="content-header">
        <h1>PaymentCategoryadd<small>Payment Category Add</small></h1>
        <ol class="breadcrumb"><li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li><li class="active">PaymentCategoryadd</li></ol>
    </section>
@stop
@section('content')
    <div class="register-box">
        <div class="register-logo">
            <b>加盟费用分类添加</b>
        </div>
        <div class="register-box-body">
            <p class="login-box-msg">添加加盟费用分类</p>
            {{Form::open(array('route' => 'paymengcategoryadd','files' => false))}}
            <div class="form-group">
                {{Form::text('category', null, array('class' => 'form-control','id'=>'title','placeholder'=>'行业名称',"required"=>"required","autocomplete"=>"off"))}}
            </div>
            <button type="submit" class="btn btn-primary block full-width m-b">添加加盟费用行业分类</button>
            {!! Form::close() !!}
        </div>
        <!-- /.form-box -->
    </div>
@stop


