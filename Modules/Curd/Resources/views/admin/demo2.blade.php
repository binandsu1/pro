@extends('layouts.admin')
@section('content')
    <section class="content-header">
        <h1>
             数据列表 - 竖
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Laravel </a></li>
            <li class="active">基础页面</li>
            <li class="active">数据列表</li>
            <li class="active">竖</li>
        </ol>
    </section>
    <section class="content">
        <div class="box box-solid">
            <x-s :resetUrl="route('admin.curd.demo2')">
                <div class="form-group">
                    <label class="control-label fw300">姓名:</label>
                    <input type="text" name="name-like"
                           class="form-control input-sm"
                           placeholder="姓名" value="<?=request('name-like')?>">
                </div>

                <div class="form-group">
                    <label class="control-label fw300">手机号:</label>
                    <input type="text" name="phone-like"
                           class="form-control input-sm"
                           placeholder="手机号" value="<?=request('phone-like')?>">
                </div>

                <div class="form-group">
                    <label class="control-label fw300">地址:</label>
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
                    <a class='btn btn-sm btn-success xdo-remote-form'
                       href="{{route('admin.curd.demo-add')}}"><i class="fa fa-plus"></i>
                        添加数据</a>
                </div>
            </div>
            <div class="no-padding box-body" style="overflow:hidden;">
                <table class="table table-bordered table-striped table-condensed">
                    <thead class="bg-dark text-white">
                    <tr>
                        <th width="20" class="tcc">ID</th>
                        <th width="80" class="tcc">姓名</th>
                        <th width="220" class="tcc">基础信息</th>
                        <th width="220" class="tcc">扩展信息</th>
                        <th width="150" class="tcc">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($list as $item)
                        <tr>
                            <td class="tcc"><b class="id-txt">{{$item->id}}</b></td>
                            <td class="tcc" style="padding:2px;">
                                <img class="avatar avatar-small" src="<?=static_url('admin/img/zz.jpg')?>" />
                                <hr style="margin:2px;" />
                                <a>{{$item->name}}</a>
                            </td>
                            <td class="no-padding">
                                <table class="small table table-inner table-bordered table-condensed table-striped"
                                       style="margin:0px;">
                                    <tbody>
                                    <tr>
                                        <th class="text-right" width="100">手机号 </th>
                                        <td><b class="text-danger">{{$item->phone}}</b></td>
                                    </tr>
                                    <tr>
                                        <th class="text-right">年级</span>：</th>
                                        <td>{{config('curd.grade')[$item->grade]}}</td>
                                    </tr>
                                    <tr>
                                        <th class="text-right">科目</span>：</th>
                                        <td>数学</td>
                                    </tr>
                                    <tr colspan="2">
                                        <th class="text-right">地址</span>：</th>
                                        <td title="{{$item->address}}">{{ str_limit(trim($item->address), 36, '...')}}</td>
                                    </tr>
                                    </tbody>
                                </table>

                            </td>
                            <td class="no-padding">
                                <table class="small table table-inner table-bordered table-condensed table-striped"
                                       style="margin:0px;">
                                    <tbody>
                                    <tr>
                                        <th width="100" class="text-right">年 龄：</th>
                                        <td width="268" class="text-danger">
                                            {{$item->age}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="text-right">数据填充</span>：</th>
                                        <td>数据填充</td>
                                    </tr>
                                    <tr>
                                        <th class="text-right">创建时间</span>：</th>
                                        <td class="h-txt"> {{$item->created_at}} </td>
                                    </tr>
                                    <tr>
                                        <th class="text-right">数据填充</span>：</th>
                                        <td class="account-txt">数据填充</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                            <td class="tcc ">
                                <a  class="btn btn-xs btn-success"> 切换状态</a>
                                <a class="btn btn-xs btn-info xdo-remote-form" href="{{route('admin.curd.demo-add',['id'=>$item->id])}}"> <i class="fa fa-pencil"></i> 编辑 </a>
                                <a class="btn btn-xs btn-danger xdo-confirm" title="确定要删除数据" href="{{route('admin.curd.demo-del',['id'=>$item->id])}}"> <i  class="fa fa-trash"></i> 删除 </a>
                                <a href="{{route('admin.curd.demo-sel',['id'=>$item->id])}}" data-size="large" class="btn btn-xs xdo-remote-content"> <i class="fa fa-eye" style="margin-right:.3em;"></i> 查看  </a>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="5" class="bg-gray" style="height:2px;padding:0px;"></td>
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
