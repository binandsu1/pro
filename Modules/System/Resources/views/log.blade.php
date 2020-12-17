@extends('layouts.admin')
@section('content')
    <section class="content-header">
        <h1>
            操作日志
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Laravel </a></li>
            <li class="active">系统管理</li>
            <li class="active">操作日志</li>
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
                <x-s :resetUrl="route('admin.laravel.artisan')">
                    <div class="form-group">
                    <label class="control-label fw300">操作表id:</label>
                    <input type="text" name="t_id-like"
                    class="form-control input-sm"
                    placeholder="操作表id" value="<?=request('t_id-like')?>">
                    </div>

                    <div class="form-group">
                        <label class="control-label fw300">表名:</label>
                        <input type="text" name="table-like"
                               class="form-control input-sm"
                               placeholder="表名" value="<?=request('table-like')?>">
                    </div>
                    @slot('more')
                    @endslot
                </x-s>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th width="5%" class="tcc ">操作</th>
                        <th width="5%" class="tcc">操作表ID</th>
                        <th width="5%" class="tcc">表名</th>
                        <th width="5%" class="tcc">操作人</th>
                        <th width="10%" class="tcc">操作时间</th>
                        <th width="30%" class="tcc">描述</th>
                        <th width="5%" class="tcc">查看</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(!$list->isEmpty())
                        @foreach($list as $item)
                            <tr>
                                <td class="tcc"> {{$item->act}} </td>
                                <td class="tcc id-txt" > {{$item->t_id}} </td>
                                <td class="tcc id-txt" >{{$item->table}}</td>
                                <td class="tcc ">  {{$item->admin_name}} </td>
                                <td class="tcc ">  {{$item->created_at}} </td>
                                <td >  {{$item->LogDesc}} </td>
                                <td class="tcc ">
                                    <a href="{{route('laravel.system.log-sel',['id'=>$item->id])}}" data-size="large" class="btn btn-xs xdo-remote-content"> <i class="fa fa-eye" style="margin-right:.3em;"></i> 查看详情  </a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
            <div class="box-footer text-center">
                @if(!$list->empty())
                    {{$list->links()}}
                @endif
            </div>
        </div>
    </section>
@stop
