@extends('layouts.admin')
@section('content')
    <section class="content-header">
        <h1>
             数据列表
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Laravel </a></li>
            <li class="active">基础CURD</li>
            <li class="active">数据列表</li>
        </ol>
    </section>
    <section class="content">
        <div class="box box-solid">
            <div class="box-header with-border">
                <h3 class="box-title"></h3>
                <div class="box-tools pull-right">
                    <a class='btn btn-sm btn-primary'
                       href=""><i class="fa fa-plus"></i>
                        添加弹窗广告</a>

                    <a class='btn btn-sm btn-primary'
                       href=""><i class="fa fa-plus"></i>
                        添加广告</a>
                </div>
            </div>

            <div class="no-padding box-body" style="overflow:hidden;">

                {{--@adminSearch(['resetUrl' => route(request()->route()->getName()),'hide'=>true])--}}
                {{--@slot('simple')--}}



                    {{--<div class="form-group">--}}
                        {{--<label class="control-label fw300">广告名称:</label>--}}
                        {{--<input type="text" name="name"--}}
                               {{--class="form-control input-sm"--}}
                               {{--placeholder="广告名称" value="<?=request('name')?>">--}}
                    {{--</div>--}}

                    {{--<div class="form-group">--}}
                        {{--<label class="control-label fw300">状态:</label>--}}
                        {{--<select class="form-control input-sm" name="status">--}}
                            {{--<option value="999">请选择</option>--}}
                            {{--<option value="0" <?=request('status') === "0" ? 'selected' : ''?>>已下线</option>--}}
                            {{--<option value="1" <?=request('status') === "1" ? 'selected' : ''?>>已上线</option>--}}
                        {{--</select>--}}
                    {{--</div>--}}
                {{--@endslot--}}
                {{--@endadminSearch--}}

                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th width="30" class="tcc">ID</th>
                        <th width="100" class="tcc">姓名</th>
                        <th width="100" class="tcc">手机号</th>
                        <th width="100" class="tcc">年龄</th>
                        <th width="100" class="tcc">年级</th>
                        <th width="100" class="tcc">创建时间</th>
                        <th width="200" class="tcc">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($list as $item)
                        <tr>
                            <td class="tcc"> {{$item->id}} </td>
                            <td class="tcc" title=""> {{$item->name}} </td>
                            <td class="tcc" title=""> {{$item->phone}}  </td>
                            <td class="tcc">  {{$item->age}} </td>
                            <td class="tcc"> {{$item->grade}}</td>
                            <td class="tcc"> {{$item->create_at}}</td>
                                <td class="tcc">
                                    <a title="是否切换成上线" class="btn btn-xs btn-success xdo-confirm" href="">  切换状态</a>
                                    <a class="btn btn-xs btn-info" href=" "> <i class="fa fa-pencil"></i> 编辑  </a>
                                    <a class="btn btn-xs btn-danger xdo-confirm" title="确定要删除数据"  href=" "> <i class="fa fa-trash"></i> 删除 </a>
                                    <x-button :route=""  :query="2" icon="fa fa-plus"  type="btn-xs"  class="btn-info" size="sm" slot="添加跟踪记录" />

                                    {{--<span class="text-gray">添加跟踪记录</span>--}}

                                    {{--@adminBtn([--}}
                                        {{--'route' => 'admin.user.detail.editFollow',--}}
                                        {{--'query' => ['u_id'=>$userObj->u_id,'do'=>'add'],--}}
                                        {{--'icon' => 'fa fa-plus',--}}
                                        {{--'type' => 'btn-primary',--}}
                                        {{--'class'=>'xdo-remote-form',--}}
                                        {{--'size' => 'sm'--}}
                                    {{--]) <span class="text-gray">添加跟踪记录</span>--}}
                                    {{--@endadminBtn--}}
                                    {{--<span class="text-info">查看</span>--}}
                                </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="box-footer text-center">

            </div>
        </div>
    </section>

    <script>
    </script>
@stop
