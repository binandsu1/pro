@extends('layouts.admin')
@section('content')

    <style type="text/css">
        .role-box {
            display: flex;
            justify-content: flex-start;
            align-items: flex-start;
            flex-wrap: wrap;
            padding: .5px;
            background-color: #ccc;
        }

        .role-box .role-item {
            width: 50%;
            padding: .5px;
            background-color: #ccc;
        }

        .role-box .role-item .role-item-inner {
            background-color: white;
            padding: 3px;
            text-align: center;
            color: #484848;
            display: block;
        }

        .role-box .role-item .role-item-inner.active {
            background-color: #aaa;
            color: #343434;
        }

        .role-box .role-item .role-item-inner:hover {
            background-color: #e0e0e0;
            color: #484848;
        }

    </style>


    <section class="content-header">
        <h1> 为<span class="text-primary">xx</span>分配权限</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> 首页</a></li>
            <li class="active">权限分配</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-sm-3">
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h4 class="box-title fw300">所有角色</h4>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <div class="box-body" style="min-height:800px;">
                        <div class="role-box">
                            @foreach($role_list as $k => $item)
                                <div class="role-item ">
                                    <a href="<?=route('laravel.system.role-set', ['id' => $item->id])?>"
                                       class="role-item-inner <?=ifelse(Request('id') == $item->id, 'active')?>"> {{$item->role_name}} </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-9" style="padding-left:0px;">
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title fw300"><i class="fa fa-gears"></i> 权限</h3>
                    </div>
                    <div class="box-body no-padding">
                        <form action="">
                            @foreach($modules as $key=>$val)
                                <div class="box box-solid">
                                    <div class="box-header with-border bg-gray-light">
                                        <h4 class="box-title txt-black fw300">
                                            {{$val['name']}}
                                        </h4>
                                        <div class="box-tools">
                                            <label style="margin-top: 5px">
                                                <input type="checkbox" class="minimal-red group-action" value="qq">
                                            </label>
                                        </div>
                                    </div>
                                        <div class="panle-body box-body" id="group-111">
                                            @foreach($val['children'] as $k=>$v)
                                            <div class="col-sm-3">
                                                <div class="form-group " style="margin:10px">
                                                    <label>
                                                        <input data-role-id="33"
                                                               class=""
                                                               type="checkbox" name="action_unioncode"
                                                               value="23"/>
                                                        <span class="text-primay" style="padding-top: 211px"> &nbsp; {{$v["name"]}}</span>
                                                    </label>
                                                    <small class="fw300">
                                                        <a title="控制器信息" href="" class="xdo-remote-form">
                                                            <i class="fa fa-info-circle"></i>
                                                        </a>
                                                    </small>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                </div>
                            @endforeach
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    <script>
        $(function () {
            $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
                checkboxClass: 'icheckbox_minimal-red',
                radioClass: 'iradio_minimal-red'
            })
            $('input.group-action').on('ifChecked', function () {
                $('#group-' + $(this).val()).find('input').iCheck('check');
            });
            $('input.group-action').on('ifUnchecked', function () {
                $('#group-' + $(this).val()).find('input').iCheck('uncheck');
            });
            // add
            $('input.action').on('ifChecked', function () {
                var $this = $(this);
                var url = $this.parents('form:first').attr('action');
                var datas = {
                    'role_id': $this.data('roleId'),
                    'action_unioncode': $this.val(),
                    'do': 'add'
                };
                $.post(url, datas, function (xhr) {
                }, 'json');
            });
            // del
            $('input.action').on('ifUnchecked', function () {
                var $this = $(this);
                var url = $this.parents('form:first').attr('action');
                var datas = {
                    'role_id': $this.data('roleId'),
                    'action_unioncode': $this.val(),
                    'do': 'del'
                };
                $.post(url, datas, function (xhr) {
                }, 'json');
            });


        });
    </script>


@stop
