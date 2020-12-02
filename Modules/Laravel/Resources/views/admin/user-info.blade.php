@extends('layouts.admin')
@section('content')
    <section class="content-header">
        <h1>
            用户认证
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Laravel </a></li>
            <li class="active">Laravel常用</li>
            <li class="active">用户认证</li>
        </ol>
    </section>
    <section class="content">
        <div class="box box-solid">
            <div class="box-header with-border">
                <span class="box-title">  </span>
                <div class="box-tools pull-center">

                </div>
            </div>
            <div class="no-padding box-body" style="overflow:hidden;"><br>
                <div style="width: 50%;float: left">
                    <p class="wa-txt">登录认证的时候做两件事情</p>
                    <p class="wa-txt">Provider负责从数据里存取用户数据 DB </p>
                    <p class="wa-txt">Guard存储用户认证的信息 Session </p>
                    <p class="wa-txt">首先随便访问一个控制器 每个控制器都集成一个底层控制器</p>
                    <p class="wa-txt">底层控制器走验证是否登录的组件-权限认证的组件</p>
                    <p class="wa-txt">auth中间件在http内核的时候就已经加载了</p>
                    <p class="wa-txt">Auth::guard($guard)->guest() 判断是否有认证信息</p>
                    <p class="wa-txt">根据不同的guard跳转不同的地方 学生登录-老师登录-管理员登录等等</p>
                    <p class="wa-txt">config/auth.php 配置 guards 叫啥名 对应 providers 对应的数据表</p>
                    <p class="wa-txt">底层控制器 $this->auth = auth('web/admin')  \View::share('auth', $this->auth) 共享auth门面的认证用户信息 </p>
                    <p class="wa-txt">$this->auth->attempt手动认证</p>
                    <p class="wa-txt">auth-request都可自定义宏指令 Request::macro $auth->macro('isSuper')用着方便</p>
                    <p class="wa-txt"></p>
                    <p class="wa-txt"></p>
                </div>

            </div>
            <div class="box-footer text-center">

            </div>
        </div>
    </section>

    <script>
    </script>
@stop
