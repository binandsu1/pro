@extends('layouts.admin')
@section('content')
    <section class="content-header">
        <h1>
            函数汇总
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Laravel </a></li>
            <li class="active">Laravel常用</li>
            <li class="active">函数汇总</li>
        </ol>
    </section>
    <section class="content">
        <div class="box box-solid">

            <div class="box-header with-border">
                <span class="box-title">

                </span>
                <div class="box-tools pull-right">
                    <a class='btn btn-sm btn-success xdo-remote-form'
                       href="{{route('admin.laravel.functions-add')}}"><i class="fa fa-plus"></i>
                        记录函数</a>
                </div>
            </div>

            <div class="no-padding box-body" style="overflow:hidden;">
                <x-s :resetUrl="route('admin.laravel.functions')">
                    <div class="form-group">
                        <label class="control-label fw300">类型:</label>
                        <select class="select2-selection" name="type-like">
                            <option value="">全部</option>
                            @foreach(config('laravel.functions') as $key=>$value)
                                <option value="{{$key}}">{{$value}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label fw300">函数:</label>
                        <input type="text" name="title-like"
                               class="form-control input-sm"
                               placeholder="函数" value="<?=request('title-like')?>">
                    </div>
                    <div class="form-group">
                        <label class="control-label fw300">描述:</label>
                        <input type="text" name="desc-like"
                               class="form-control input-sm"
                               placeholder="描述" value="<?=request('desc-like')?>">
                    </div>
                    @slot('more')
                    @endslot
                </x-s>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        {{--<th width="5%" class="tcc ">ID</th>--}}
                        <th width="5%" class="tcc">类型</th>
                        <th width="15%" class="tcc">函数</th>
                        <th width="15%" class="tcc">描述</th>
                        <th width="8%" class="tcc">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(!$list->isEmpty())
                        @foreach($list as $item)
                            @php
                                    $color = '';   
                                    if($item->type=='functions_linux'){
                                        $color = 'id-txt';
                                    }
                                    if ($item->type=='functions_arr'){
                                        $color = 'z-txt';
                                    }
                                    if ($item->type=='functions_str'){
                                        $color = 'wa-txt';
                                    }
                            @endphp
                            <tr>
                                <td class="tcc {{$color}}"> {{config('laravel.functions')[$item->type]}} </td>
                                <td class=" "
                                    title="{{$item->title}}"> {!! str_replace(request('title-like'), "<span class='dt-txt'>".request('title-like').'</span>', $item->title) !!} </td>
                                <td class=" ">  {!! str_replace(request('desc-like'), "<span class='dt-txt'>".request('desc-like').'</span>', $item->desc) !!} </td>
                                <td class="tcc" title="{{$item->desc}}">
                                    <a class="btn btn-xs btn-info xdo-remote-form"
                                       href="{{route('admin.laravel.functions-add',['id'=>$item->id])}}"> <i
                                                class="fa fa-pencil"></i> 编辑 </a>
                                    <a class="btn btn-xs btn-danger xdo-confirm" title="确定要删除数据"
                                       href="{{route('admin.laravel.functions-del',['id'=>$item->id])}}"> <i
                                                class="fa fa-trash"></i> 删除 </a>
                                    <a href="{{route('admin.laravel.functions-sel',['id'=>$item->id])}}"
                                       data-size="large" class="btn btn-xs xdo-remote-content"> <i class="fa fa-eye"
                                                                                                   style="margin-right:.3em;"></i>
                                        查看</a>
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
