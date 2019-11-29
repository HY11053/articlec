@extends('admin.layouts.admin_app')
@section('title')内容生成管理系统@stop
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
    </style>
@stop
@section('header_position')
    <section class="content-header">
        <h1>Index</h1>
        <ol class="breadcrumb"><li><a href="#"><i class="fa fa-dashboard"></i> Index</a></li><li class="active">/</li></ol>
    </section>
@stop
@section('content')
Index
@stop

