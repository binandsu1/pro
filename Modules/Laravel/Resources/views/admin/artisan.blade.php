@extends('layouts.admin')
@section('content')
    <section class="content-header">
        <h1>
            脚本命令
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Laravel </a></li>
            <li class="active">Laravel常用</li>
            <li class="active">脚本命令</li>
        </ol>
    </section>
    <section class="content">
        <div class="box box-solid">

            <div class="box-header with-border">
                <span class="box-title">

                </span>
                <div class="box-tools pull-right">
                    <a class='btn btn-sm btn-success xdo-remote-form'
                       href="{{route('admin.laravel.artisan-add')}}"><i class="fa fa-plus"></i>
                        添加脚本</a>
                </div>
            </div>

            <div class="no-padding box-body" style="overflow:hidden;">
                <x-s :resetUrl="route('admin.laravel.artisan')">
                    <div class="form-group">
                    <label class="control-label fw300">标题:</label>
                    <input type="text" name="title-like"
                    class="form-control input-sm"
                    placeholder="标题" value="<?=request('title-like')?>">
                    </div>

                    <div class="form-group">
                        <label class="control-label fw300">命令:</label>
                        <input type="text" name="name-like"
                               class="form-control input-sm"
                               placeholder="命令" value="<?=request('name-like')?>">
                    </div>

                    <div class="form-group">
                        <label class="control-label fw300">介绍:</label>
                        <input type="text" name="desc-like"
                               class="form-control input-sm"
                               placeholder="介绍" value="<?=request('desc-like')?>">
                    </div>
                    @slot('more')
                    @endslot
                </x-s>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th width="5%" class="tcc ">ID</th>
                        <th width="10%" class="tcc">标题</th>
                        <th width="15%" class="tcc">命令</th>
                        <th width="20%" class="tcc">介绍</th>
                        <th width="15%" class="tcc">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(!$list->isEmpty())
                        @foreach($list as $item)
                            <tr>
                                <td class="tcc id-txt"> {{$item->id}} </td>
                                <td class="tcc " title="{{$item->title}}"> {{$item->title}} </td>
                                <td class=" id-txt" title=""> <span id="copyMy{{$item->id}}">{{$item->name}}</span>  </td>
                                <td class="tcc ">  {{$item->desc}} </td>
                                <td class="tcc ">
                                    <a class="btn btn-xs btn-info xdo-remote-form" href="{{route('admin.laravel.artisan-add',['id'=>$item->id])}}"> <i class="fa fa-pencil"></i> 编辑 </a>
                                    <a class="btn btn-xs btn-danger xdo-confirm" title="确定要删除数据" href="{{route('admin.laravel.artisan-del',['id'=>$item->id])}}"> <i class="fa fa-trash"></i> 删除 </a>
                                    <a href="{{route('admin.laravel.artisan-sel',['id'=>$item->id])}}" data-size="large" class="btn btn-xs xdo-remote-content"> <i class="fa fa-eye" style="margin-right:.3em;"></i> 查看  </a>
                                    <a class="btn btn-xs btn-warning" onClick="copyFn({{$item->id}})"> <i class="fa fa-print" style="margin-right:.3em;"></i> 复制命令 </a>
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
    <script>
        function copyFn(id) {
            var val = document.getElementById('copyMy'+id);
            window.getSelection().selectAllChildren(val);
            document.execCommand("Copy");
            layer.msg('复制成功');
        }
    </script>
@stop
