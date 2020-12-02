<?php
$user = auth('web')->user();
//dd($user);
?>

<a href="/admin" class="logo">
    <span class="logo-mini">
      <img src="<?=static_url('admin/img/xl1.png')?>" width="30"/>
    </span>
    <span class="logo-lg" style="margin-left:-10px;">
      <img src="<?=static_url('admin/img/log3.jpg')?>" width="100"/>
      <span style="font-size:10px;"></span>
    </span>
</a>
<nav class="navbar navbar-static-top">
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
    </a>
    <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

            <li class="hidden-xs hidden-sm hidden-md">
                <form class="navbar-form navbar-left" method="get" action="<?=route('admin.search.global')?>">
                    <div class="form-group">
                        全局搜索：
                        <div class="input-group  input-group-sm" style="width:180px;">
                            <input type="text" class="form-control" name="_value" value="<?=request('_value')?>"
                                   placeholder="问题描述">
                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-danger"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </form>
            </li>

            <li class="hidden-sm hidden-xs">
                <a href="#">
                    <i class="fa fa-home"></i> 官网首页
                </a>
            </li>
            <li class="hidden-sm hidden-xs">
                <!-- <a href="http://live.jswebcall.com/live/chat.dll?c=12588&g=20103&f=27429&refer=" target="_blank" class="xdo-kefu"> -->
                <a href="https://pre2.easyliao.com/live/chat.dll?c=12588&g=20103&config=27429&ref=在线管理后台&ext=%23params%3Ae_user%2C姓名：xxx，ID：111，身份："
                   target="_blank" class="xdo-kefu">
                    <b>
                        <i class="fa fa-commenting"></i> 人工客服
                    </b>
                </a>
            </li>
            <li class="dropdown messages-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-link"></i>
                    辅助功能链接
                </a>
                <ul class="dropdown-menu" style="font-size: 11px;">
                    <li>
                        <ul class="menu">
                            <li>
                                <a href="https://layer.layui.com" target="_blank" class="text-success">
                                    <i class="fa fa-map fa-w"></i>
                                    <span style="margin-left:1em;">Layer</span>
                                </a>
                            </li>
                            <li>
                                <a href="https://xueyuanjun.com/books/laravel-docs-8" target="_blank"
                                   class="text-success">
                                    <i class="fa fa-graduation-cap fa-w"></i>
                                    <span style="margin-left:0.5em;">学院君</span>
                                </a>
                            </li>
                            <li>
                                <a href="https://v3.bootcss.com/components/" target="_blank" class="text-success">
                                    <i class="fa  fa-fire"></i>
                                    <span style="margin-left:1em;">Bootstap</span>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.highcharts.com.cn/demo/highcharts/pie-gradient/grid-light" target="_blank" class="text-success">
                                    <i class="fa  fa-search"></i>
                                    <span style="margin-left:1em;">highcharts</span>
                                </a>
                            </li>
                            <li>
                                <a href="https://cn.vuejs.org/v2/guide/" target="_blank" class="text-success">
                                    <i class="fa  fa-asterisk"></i>
                                    <span style="margin-left:1em;">Vue</span>
                                </a>
                            </li>

                        </ul>
                    </li>
                </ul>
            </li>

        </ul>
        <ul class="nav navbar-nav">
            <li class="dropdown messages-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-envelope-o"></i>
                    <span class="label label-success">0</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="header">你有0个消息</li>
                    <li>
                        <ul class="menu">
                        </ul>
                    </li>
                    <li class="footer"><a href="#">查看所有消息</a></li>
                </ul>
            </li>
            <li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-bell-o"></i>
                    <span class="label label-warning">0</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="header">你有0个通知</li>
                    <li>
                        <ul class="menu">
                        </ul>
                    </li>
                    <li class="footer"><a href="#">查看所有</a></li>
                </ul>
            </li>
            <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    {{--<img src="" class="user-image" alt="User Image">--}}
                    <img class="user-image" src="<?=static_url('admin/img/nm.jpg')?>"/>
                    <span class="hidden-xs"> {{$user->name}} </span>
                </a>
                <ul class="dropdown-menu">
                    <!-- User image -->
                    <li class="user-header">
                        <img class="avatar avatar-small" src="<?=static_url('admin/img/nm.jpg')?>"/>
                        <p>
                            {{$user->name}}
                            <small>

                            </small>
                        </p>
                    </li>
                    <li class="user-footer">
                        <div class="row">
                            {{--<div class="col-sm-4">--}}
                            {{--<a href="" class="xdo-remote-form btn btn-primary btn-xs">修改密码</a>--}}
                            {{--</div>--}}
                            <div class="col-sm-4">
                                <a href="" class="btn btn-primary btn-xs">个人中心</a>
                            </div>
                            <div class="col-sm-4">
                                <!--                  --><?php //if($auth->isRealSuper()):?>
                                <a href=""
                                   class="btn btn-warning btn-xs">还原身份</a>
                                <!--                  --><?php //endif;?>
                            </div>
                            <div class="col-sm-4">
                                <a href="<?=url('/admin/logout')?>"
                                   class="btn btn-danger btn-xs">退出登录</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#" data-toggle="control-sidebar">
                    <i class="fa fa-home"></i>
                    <b class="text-danger">[切换]</b>
                </a>
            </li>
        </ul>
    </div>
</nav>
