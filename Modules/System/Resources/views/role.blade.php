@extends('layouts.admin')
@section('content')
    <section class="content-header">
        <h1>
            角色管理
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Laravel </a></li>
            <li class="active">系统管理</li>
            <li class="active">角色管理</li>
        </ol>
    </section>
    <section class="content">
        <div class="box box-solid">

            <div class="box-header with-border">
                <span class="box-title">

                </span>
                <div class="box-tools pull-right">
                    <a class='btn btn-sm btn-success xdo-remote-form'
                       href="{{route('laravel.system.role-add')}}"><i class="fa fa-plus"></i>
                        添加角色</a>
                </div>
            </div>

            <div class="no-padding box-body" style="overflow:hidden;">
                <table class="table table-bordered ">
                    <thead>
                    <tr>
                        <th width="5%" class="tcc ">ID</th>
                        <th width="10%" class="tcc">角色</th>
                        <th width="5%" class="tcc">状态</th>
                        <th width="10%" class="tcc">填充数据</th>
                        <th width="10%" class="tcc">填充数据</th>
                        <th width="10%" class="tcc">填充数据</th>
                        <th width="10%" class="tcc">填充数据</th>
                        <th width="10%" class="tcc">创建时间</th>
                        <th width="15%" class="tcc">操作</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($list as $item)
                        <tr>
                            <td class="tcc id-txt"> {{$item->id}} </td>
                            <td class="tcc "> {{$item->role_name}}</td>
                            @if($item->status == 1)
                                <td class="tcc green-txt"> 启用 </td>
                            @else
                                <td class="tcc id-txt"> 禁用 </td>
                            @endif
                            <td class="tcc "> --  </td>
                            <td class="tcc "> --  </td>
                            <td class="tcc "> --  </td>
                            <td class="tcc "> --  </td>
                            <td class="tcc "> {{$item->created_at}}  </td>
                            <td class="tcc ">
                                @if($item->status == 1)
                                    <a  class="btn btn-xs btn-danger xdo-confirm" href="{{route('laravel.system.role-up',['id'=>$item->id,'status'=>2])}}" title="是否切换成禁用">禁用</a>
                                @else
                                    <a  class="btn btn-xs btn-success xdo-confirm" href="{{route('laravel.system.role-up',['id'=>$item->id,'status'=>1])}}" title="是否切换成启用">启用</a>
                                @endif
                                <a class="btn btn-xs btn-info xdo-remote-form" href="{{route('laravel.system.role-add',['id'=>$item->id])}}"> <i class="fa fa-pencil"></i> 编辑 </a>
                                <a class="btn btn-xs btn-danger xdo-confirm" title="确定要删除数据" href="{{route('laravel.system.role-del',['id'=>$item->id])}}"> <i  class="fa fa-trash"></i> 删除 </a>
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="box-footer text-center">
                {{$list->links()}}
            </div>
        </div>
    </section>
@stop
