@extends('layouts.admin')
@section('content')
    <section class="content-header">
        <h1>
            数据列表 - 横
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Laravel </a></li>
            <li class="active">基础页面</li>
            <li class="active">数据列表</li>
            <li class="active">横</li>
        </ol>
    </section>
    <section class="content">
        <div class="box box-solid">
            <x-s :resetUrl="route('admin.curd.demo1')" :excel="true">
                <div class="form-group">
                    <label class="control-label fw300"></label>
                    <input type="text" name="name-like"
                           class="form-control input-sm"
                           placeholder="姓名" value="<?=request('name-like')?>">
                </div>

                <div class="form-group">
                    <label class="control-label fw300"></label>
                    <input type="text" name="phone-like"
                           class="form-control input-sm"
                           placeholder="手机号" value="<?=request('phone-like')?>">
                </div>

                <div class="form-group">
                    <label class="control-label fw300"></label>
                    <input type="text" name="address-like"
                           class="form-control input-sm"
                           placeholder="地址" value="<?=request('address-like')?>">
                </div>
                @slot('more')
                @endslot
            </x-s>
            <div class="box-header with-border">
                <span class="box-title">

                </span>
                <div class="box-tools pull-right">
                    {{--data-size="large"--}}
                    <a class='btn btn-sm btn-success xdo-remote-form'
                       href="{{route('admin.curd.demo-add')}}"><i class="fa fa-plus"></i>
                        添加数据</a>
                </div>
            </div>

            <div class="no-padding box-body" style="overflow: auto; width: 100%;">
                <table class="table table-bordered ">
                    <thead>
                    <tr>
                        <th width="5%" class="tcc ">ID</th>
                        <th width="10%" class="tcc">姓名</th>
                        <th width="10%" class="tcc">手机号</th>
                        <th width="5%" class="tcc">年龄</th>
                        <th width="10%" class="tcc">年级</th>
                        <th width="5%" class="tcc">状态</th>
                        <th width="20%" class="tcc">地址</th>
                        <th width="10%" class="tcc">创建时间</th>
                        <th width="20%" class="tcc">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($list as $item)
                        <tr>
                            <td class="tcc id-txt"> {{$item->id}} </td>
                            <td class="tcc " title="{{$item->name}}"> {!! str_replace(request('name-like'), "<span class='dt-txt'>".request('name-like').'</span>', $item->name) !!}  </td>
                            <td class="tcc " title=""> {!! str_replace(request('phone-like'), "<span class='dt-txt'>".request('phone-like').'</span>', $item->phone) !!}   </td>
                            <td class="tcc ">  {{$item->age}} </td>
                            <td class="tcc "> {{config('curd.grade')[$item->grade]}}</td>
                            <td class="tcc "> 离线</td>
                            <td title="{{$item->address}}">  {{ str_limit(trim($item->address), 36, '...')}} </td>
                            <td class="tcc dt-txt"> {{$item->created_at}}</td>
                            <td class="tcc ">
                                <a  class="btn btn-xs btn-success" > 切换状态</a>
                                <a class="btn btn-xs btn-info xdo-remote-form" href="{{route('admin.curd.demo-add',['id'=>$item->id])}}"> <i class="fa fa-pencil"></i> 编辑 </a>
                                <a class="btn btn-xs btn-danger xdo-confirm" title="确定要删除数据" href="{{route('admin.curd.demo-del',['id'=>$item->id])}}"> <i  class="fa fa-trash"></i> 删除 </a>
                                <a href="{{route('admin.curd.demo-sel',['id'=>$item->id])}}" data-size="large" class="btn btn-xs xdo-remote-content"> <i class="fa fa-eye" style="margin-right:.3em;"></i> 查看  </a>
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

    <script>
    </script>
@stop
