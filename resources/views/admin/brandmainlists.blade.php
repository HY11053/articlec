@extends('admin.layouts.admin_app')
@section('title')品牌名称列表@stop
@section('head')
    <link href="/adminlte/plugins/iCheck/all.css" rel="stylesheet">
    <link href="/adminlte/plugins/iCheck/flat/green.css" rel="stylesheet">
    <style>.red{color: red;}</style>
@stop
@section('header_position')
    <section class="content-header">
        <h1>Brandname Lists<small>Brandname  Lists</small></h1>
        <ol class="breadcrumb"><li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li><li class="active">Brandname Lists</li></ol>
    </section>
@stop
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">品牌名称列表管理 品牌总计{{$brandinfolists->total()}}</h3>
                    <div class="box-tools">
                        <form action="/search/brand" method="post" class="form-group pull-right col-md-2 col-xs-6">
                            <div class="input-group input-group-sm ">
                                <input type="text" name="brandname" class="form-control pull-right" placeholder="品牌搜索">
                                {{csrf_field()}}
                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <div class="mailbox-controls">
                        <!-- Check all button -->
                        <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa  fa-check-circle"></i> 全选</button>
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-sm  delete-event" data-toggle="modal" data-target="#modal-default"><i class="fa fa-trash-o"> 批量删除</i></button>
                            <button type="button" class="btn btn-default btn-sm  edittype-event"  data-toggle="modal" data-target="#modal-default2"><i class="fa  fa-paint-brush"></i> 批量更改分类</button>
                        </div>
                    </div>
                    <div class="table-responsive mailbox-messages">
                        <table class="table table-hover">
                            <tr>
                                <th>品牌名称</th>
                                <th>num</th>
                                <th>导入时间</th>
                            </tr>
                            @foreach($brandinfolists as $brandinfolist)
                                <tr>
                                    <td>{{$brandinfolist->brandname}}</td>
                                    <td>{{$brandinfolist->num}}</td>
                                    <td>@if(\Carbon\Carbon::now() > \Carbon\Carbon::parse($brandinfolist->created_at)->addDays(7)){{$brandinfolist->created_at}} @else{{\Carbon\Carbon::parse($brandinfolist->created_at)->diffForHumans()}}@endif </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    {!! $brandinfolists->links() !!}
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
    <!-- /.content -->
@stop

