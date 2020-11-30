@extends('layouts.admin')
@section('content')
    <section class="content-header">
        <h1>
            问题汇总
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Laravel </a></li>
            <li class="active">Laravel常用</li>
            <li class="active">问题汇总</li>
        </ol>
    </section>
    <section class="content">
        <div class="box box-solid">

            <div class="box-header with-border">
                <span class="box-title">

                </span>
                <div class="box-tools pull-right">
                    <a class='btn btn-sm btn-success xdo-remote-form'
                       href="{{route('admin.laravel.question-add')}}"><i class="fa fa-plus"></i>
                        记录问题</a>
                </div>
            </div>

            <div class="no-padding box-body" style="overflow:hidden;">
                <x-s :resetUrl="route('admin.laravel.question')">
                    <div class="form-group">
                    <label class="control-label fw300">问题:</label>
                    <input type="text" name="title-like"
                    class="form-control input-sm"
                    placeholder="问题" value="<?=request('title-like')?>">
                    </div>

                    <div class="form-group">
                        <label class="control-label fw300">解决方案:</label>
                        <input type="text" name="desc-like"
                               class="form-control input-sm"
                               placeholder="解决方案" value="<?=request('desc-like')?>">
                    </div>
                    @slot('more')
                    @endslot
                </x-s>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        {{--<th width="5%" class="tcc ">ID</th>--}}
                        <th width="15%" class="tcc">问题</th>
                        <th width="15%" class="tcc">解决方案</th>
                        <th width="8%" class="tcc">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(!$list->isEmpty())
                        @foreach($list as $item)
                            <tr>
                                {{--<td class="tcc id-txt"> {{$item->id}} </td>--}}
                                <td class="tcc " title="{{$item->title}}"> {!! str_replace(request('title-like'), "<span class='dt-txt'>".request('title-like').'</span>', $item->title) !!} </td>
                                <td class="tcc ">  {!! str_replace(request('desc-like'), "<span class='dt-txt'>".request('desc-like').'</span>', $item->desc) !!} </td>
                                <td class="tcc" title="{{$item->desc}}">
                                    <a class="btn btn-xs btn-info xdo-remote-form" href="{{route('admin.laravel.question-add',['id'=>$item->id])}}"> <i class="fa fa-pencil"></i> 编辑 </a>
                                    <a class="btn btn-xs btn-danger xdo-confirm" title="确定要删除数据" href="{{route('admin.laravel.question-del',['id'=>$item->id])}}"> <i class="fa fa-trash"></i> 删除 </a>
                                    <a href="{{route('admin.laravel.question-sel',['id'=>$item->id])}}" data-size="large" class="btn btn-xs xdo-remote-content"> <i class="fa fa-eye" style="margin-right:.3em;"></i> 查看  </a>
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
