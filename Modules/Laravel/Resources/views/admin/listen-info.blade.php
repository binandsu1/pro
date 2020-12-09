@extends('layouts.admin')
@section('content')
    <section class="content-header">
        <h1>
            事件监听
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Laravel </a></li>
            <li class="active">Laravel常用</li>
            <li class="active">事件监听</li>
        </ol>
    </section>
    <section class="content">
        <div class="box box-solid">
            <div class="box-header with-border">
                <span class="box-title"></span>
                <span class="box-title"></span>
                <div class="box-tools pull-center"></div>
            </div>
            <div class="no-padding box-body" style="overflow:hidden;"><br>
                <div style="width: 70%;float: left">
                    <p class="wa-txt">laravel观察者模式</p>
                    <p class="wa-txt">事件监听举例说明：添加一个学生的时候 通知信息给管理员 谁加了一条信息 直接放到学生save方法也可以 but 格局小了</p>
                    <p class="wa-txt">EventServiceProvider.php里加入自己的事件监听</p>
                    <p class="wa-txt">protected $listen = [ #添加用户后 'App\Events\AddUserEvent' => [#通知管理员 'App\Listeners\CallAdmin',],];</p>
                    <p class="wa-txt">./artisan event:generate</p>
                    <p class="wa-txt">生成事件和监听的两个文件 app\Events\AddUserEvent.php app\Listeners\CallAdmin.php</p>
                    <p class="wa-txt">事件只存一个model实例</p>
                    <p class="wa-txt">监听handle获取处理</p>
                    <p class="wa-txt">一个事件可以过多个监听器</p>
                    <p class="wa-txt">也可以手动注册监听事件 在EventServiceProvider的boot里    Event::listen(function (AddUserEvent $event) {
                        //啦啦啦啦
                        }); </p>
                    <p class="wa-txt">也可以队列监听</p>
                    <p class="wa-txt">三种方式 默认监听 在EventServiceProvider里 自定义监听 和 自定义队列监听 也可以在监听器里加入队列</p>
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
