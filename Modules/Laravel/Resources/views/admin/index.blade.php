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
