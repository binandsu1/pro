@extends('layouts.admin')
@section('content')
    <section class="content-header">
        <h1>
            管理员列表
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Laravel </a></li>
            <li class="active">系统管理</li>
            <li class="active">管理员列表</li>
        </ol>
    </section>
    <section class="content">
        <div class="box box-solid">

            <div class="box-header with-border">
                <span class="box-title">

                </span>
                <div class="box-tools pull-right">

                </div>
            </div>

            <div class="no-padding box-body" style="overflow:hidden;">

                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th width="5%" class="tcc ">ID</th>
                        <th width="5%" class="tcc">姓名</th>
                        <th width="5%" class="tcc">登录状态</th>
                        <th width="5%" class="tcc">数据填充</th>
                        <th width="5%" class="tcc">数据填充</th>
                        <th width="5%" class="tcc">数据填充</th>
                        <th width="8%" class="tcc">创建时间</th>
                        <th width="8%" class="tcc">更新时间</th>
                        <th width="15%" class="tcc">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(!$list->isEmpty())
                        @foreach($list as $item)
                            <tr>
                                <td class="tcc"> {{$item->id}} </td>
                                <td class="tcc"> {{$item->name}} </td>
                                <td class="tcc">
                                    @if($item->status == 1)
                                        <span class="wa-txt">允许登录</span>
                                    @endif
                                    @if($item->status == 2)
                                        <span class="id-txt">禁止登录</span>
                                    @endif
                                </td>
                                <td class="tcc id-txt">--</td>
                                <td class="tcc"> --</td>
                                <td class="tcc"> --</td>
                                <td class="tcc ">  {{$item->created_at}} </td>
                                <td class="tcc ">  {{$item->updated_at}} </td>
                                <td class="tcc ">
                                    @if($item->status == 2)
                                        <a title="是否切换允许登录" class="btn btn-xs btn-success xdo-confirm"
                                           href="{{route('laravel.system.prohibit',['id'=>$item->id,'status'=>1])}}">
                                            允许登录</a>
                                    @endif
                                    @if($item->status == 1)
                                        <a title="是否切换成限制登录" class="btn btn-xs btn-danger xdo-confirm"
                                           href="{{route('laravel.system.prohibit',['id'=>$item->id,'status'=>2])}}">
                                            限制登录</a>
                                    @endif
                                    <a class="btn btn-xs btn-info xdo-remote-form"
                                       href="{{route('admin.curd.demo-add',['id'=>$item->id])}}"> <i
                                            class="fa fa-pencil"></i> 编辑 </a>
                                    <a class="btn btn-xs btn-danger xdo-confirm" title="确定要删除数据"
                                       href="{{route('admin.curd.demo-del',['id'=>$item->id])}}"> <i
                                            class="fa fa-trash"></i> 删除 </a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
            <div class="box-footer text-center">
                @if($list->count())
                    {{$list->links()}}
                @endif
            </div>
        </div>
    </section>
@stop
