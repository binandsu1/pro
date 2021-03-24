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
                        <th width="5%" class="tcc">数据填充</th>
                        <th width="8%" class="tcc">创建时间</th>
                        <th width="8%" class="tcc">更新时间</th>
                        <th width="10%" class="tcc">操作</th>
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
                                <td class="tcc"> --</td>
                                <td class="tcc ">  {{$item->created_at}} </td>
                                <td class="tcc ">  {{$item->updated_at}} </td>
                                <td class="tcc ">
                                    <a title="分配角色" class="btn btn-xs btn-success" onclick="cf({{$item->id}})">
                                        分配角色</a>
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

    <div id="peace" style="display: none">
        <div id="tsf" style="margin-top: 10px;margin-left: 10px; height: 400px;"></div>
        <div id="button-box" style="float: right;margin-right: 18px;">
            <button type="button" id="hide_button" class="layui-btn  layui-btn-sm" lay-demotransferactive="getData">保存
            </button>
            <button type="button" id="hide_button" class="layui-btn layui-btn-primary layui-btn-sm"
                    lay-demotransferactive="closey">取消
            </button>
        </div>
    </div>

    <script type="text/javascript">
        var data1 = '';

        function cf(admin_id) {
            //打开弹窗 传入角色id
            layer.open({
                type: 1
                , title: '分配角色'
                , area: ['505px', '490px']
                , content: $('#peace')
            });
            //假的加载
            layer.load(2, {time: 1 * 1000});
            var url = "<?=route('laravel.system.role-laod')?>";
            var add_role_url = "<?=route('laravel.system.admin-add-role')?>";
            var params = {
                admin_id: admin_id,
            }
            //获取所有角色 和 当前管理员你的角色
            $.get(url,params, function (resp) {
                if (resp) {
                    data1 = resp.data1;
                    data2 = resp.data2;
                    // alert(data1);
                    layui.use(['transfer', 'layer', 'util'], function () {
                        var $ = layui.$
                            , transfer = layui.transfer
                            , layer = layui.layer
                            , util = layui.util;
                        transfer.render({
                            elem: '#tsf'
                            , data: data1
                            , value: data2
                            , title: ['所有角色', '当前角色']
                            , showSearch: true
                            , id: 'key123'//唯一key
                            , height: 360 //定义高度
                        })
                        //获取右侧选中的数据
                        util.event('lay-demoTransferActive', {
                            getData: function (othis) {
                                var getData = transfer.getData('key123');
                                var ids = '';
                                $.each(getData, function (idx, item) {
                                    ids += item.value + ',';
                                });
                                ids = ids.substring(0, ids.length - 1);
                                var role_params = {
                                    admin_id: admin_id,
                                    role_id: ids,
                                }
                                // layer.alert(JSON.stringify(getData));
                                //传入后台保存
                                $.get(add_role_url, role_params, function (resp) {
                                    layer.load(2, {time: 1 * 1000});
                                    layer.closeAll();
                                }, 'json');
                            },
                            closey: function (othis) {
                                layer.closeAll();
                            }
                        });
                    });
                }
            }, 'json');
        }

    </script>


@stop
