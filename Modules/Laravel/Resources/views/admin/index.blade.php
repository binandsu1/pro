@extends('layouts.admin')
@section('content')
    <section class="content-header">
        <h1>
            请求生命周期
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Laravel </a></li>
            <li class="active">Laravel常用</li>
            <li class="active">请求生命周期</li>
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
                    <p class="wa-txt">请求访问到入口public/index </p>
                    <p class="wa-txt">加载bootstrap/app 创建服务容器 </p>
                    <p class="wa-txt">app里三个 http内核处理web请求 console内核处理artisan命令 Exceptions处理异常的吧 </p>
                    <p class="wa-txt">http内核继承HttpKernel里面$bootstrappers加载一些处理错误日志啥的 </p>
                    <p class="wa-txt">http内核过中间件 全局中间件-中间件组-路由名中间件-中间件排序</p>
                    <p class="wa-txt">启动内核最重要的动作之一载入服务提供者 config/app -- providers数组里 先 register 在 boot </p>
                    <p class="wa-txt">服务提供者 app/Providers 下 </p>
                    <p class="wa-txt">AppServiceProvider 自定义启动 and 容器绑定 </p>
                    <br>
                    <br>
                    <br>
                    <p class="wa-txt">v2.0</p>
                    <p class="wa-txt">首先请求访问到public/index  做三个事情  加载composer项目依赖三方组件   创建laravel服务容器   接受请求并返回  </p>
                    <p class="wa-txt">加载项目依赖三方组件 vendor/autoload.php </p>
                    <p class="wa-txt">创建laravel服务容器  $app = require_once __DIR__.'/../bootstrap/app.php'; </p>
                    <p class="wa-txt">剩下的接受请求并返回  </p>
                    <p class="wa-txt">让我们看看创建服务容器做了些什么</p>
                    <p class="wa-txt">做了两个事情  1 创建服务容器 new 了一个application   2 绑定内核到服务容器 </p>
                    <p class="wa-txt">new 了一个application 做了四个事情</p>
                    <p class="wa-txt">1 基础路径注册到路由</p>
                    <p class="wa-txt">2 讲app实例注册到自身服务容器 app->make() </p>
                    <p class="wa-txt">3 注册基础服务提供者到服务容器  4 注册别名到服务容器 </p>
                    <p class="wa-txt">4 注册别名到服务容器 </p>
                    <p class="wa-txt">绑定内核到服务容器 三个内核 1 http内核 2 console内核 3 debug内核  </p>
                    <p class="wa-txt">主要看http内核 </p>
                    <p class="wa-txt">kernel 定义了三种中间件 全局中间件 中间件组  路由中间件 别名 </p>
                    <p class="wa-txt">继承的HttpKernel  </p>
                    <p class="wa-txt">$bootstrappers 错误处理、日志、检测应用环境以及其它在请求被处理前需要执行的任务。 </p>
                    <p class="wa-txt">$middlewarePriority  处理HTTP会话的读写、判断应用是否处于维护模式、验证 CSRF 令牌等等 </p>
                    <p class="wa-txt"> 接下来是载入服务提供者</p>
                    <p class="wa-txt">config/app.php 配置文件的 providers 数组中 </p>
                    <p class="wa-txt">首先 所有提供者的 register 方法被调用 然后 所有提供者被注册之后 boot 方法被调用  </p>
                    <p class="wa-txt">启动组件 比如db cache queue route 验证器组件等 </p>
                    <p class="wa-txt">所有boot整完讲请求分配给路由 然后控制器 页面  </p>
                    <p class="wa-txt">over </p>
                </div>
                <div style="width:50%;float: right;margin-top: -1%">
                    <p class="wa-txt"><img src="<?=static_url('admin/img/s.jpg')?>" width="510"/></p>
                </div>
            </div>
            <div class="box-footer text-center">

            </div>
        </div>
    </section>

    <script>
    </script>
@stop
