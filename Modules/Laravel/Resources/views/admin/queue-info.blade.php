@extends('layouts.admin')
@section('content')
    <section class="content-header">
        <h1>
            队列介绍
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Laravel </a></li>
            <li class="active">Laravel常用</li>
            <li class="active">队列介绍</li>
        </ol>
    </section>
    <section class="content">

        <div class="box box-solid">

            <div class="box-header with-border">
                <span class="">
                    数组总计 {{$list->total()}} 条  成功{{$total_arr["success"]}}条   &nbsp;  失败{{$total_arr["error"]}}条
                </span>
                <div class="box-tools pull-right">
                    <a class='btn btn-sm btn-success'
                       href="{{route('admin.laravel.queue',['num'=>100])}}"><i class="fa fa-plus"></i>
                        生成100条数据</a>
                </div>
            </div>

            <div class="no-padding box-body" style="overflow:hidden;">

                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th width="5%" class="tcc ">ID</th>
                        <th width="15%" class="tcc">i</th>
                        <th width="10%" class="tcc">随机数</th>
                        <th width="15%" class="tcc">随机数</th>
                        <th width="15%" class="tcc">状态</th>
                        <th width="20%" class="tcc">创建时间</th>
                        <th width="20%" class="tcc">修改时间</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(!$list->isEmpty())
                        <?php
                            $status[0] = "失败";
                            $status[1] = "成功";
                        ?>
                        @foreach($list as $item)
                            <tr>
                                <td class="tcc id-txt"> {{$item->id}} </td>
                                <td class="tcc"> {{$item->i}} </td>
                                <td class="tcc"> {{$item->name}} </td>
                                <td class="tcc ">  {{$item->num}} </td>
                                <td class="tcc ">  {{$status[$item->is_over]}} </td>
                                <td class="tcc "> {{$item->created_at}}</td>
                                <td class="tcc "> {{$item->updated_at}}</td>
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

        <div class="box box-solid">
            <div class="box-header with-border">
                <span class="box-title">  </span>
                <div class="box-tools pull-center">

                </div>
            </div>
            <div class="no-padding box-body" style="overflow:hidden;"><br>
                <div style="width: 50%;float: left">
                    <p class="wa-txt">队列-生产&&消费 将耗时的任务延时处理</p>
                    <p class="wa-txt">实现了一个空接口ShouldQueue告诉laravel不是立即执行是队列</p>
                    <p class="wa-txt">__construct构造函数里可以从控制器传参数可以依赖注入model</p>
                    <p class="wa-txt">handle(User $usermodel)model job本身不能loginfo传出services在做具体操作</p>
                    <p class="wa-txt">$model->withoutRelations 输出少点？？？</p>
                    <p class="wa-txt">配置文件config/queue里</p>
                    <p class="wa-txt">控制器UserJob::dispatch($i);可以传参</p>
                    <p class="wa-txt">控制器UserJob队列里设置通用最大失败尝试次数-执行时间等构造函数指定连接方式队列名参数</p>
                    <p class="wa-txt">handle消费传出服务里的方法开始执行</p>
                    <p class="wa-txt">执行过程中记录错误数据再次处理</p>
                    <p class="wa-txt">dispatchIf按条件分发队列 ->delay(now()->addMinutes(10)); 延迟分发单位min</p>
                    <p class="wa-txt">dispatchAfterResponse先直接返回给客户端响应 适用于任务耗时比较长的情况?</p>
                    <p class="wa-txt">dispatchNow直接执行不分配给队列-调试直接跑无需启动队列</p>
                    <p class="wa-txt">Laravel 的 Redis 限制频率功能 可以直接写job里乱套</p>
                    <p class="wa-txt">UserJob::dispatch($i)->through([new RateLimited()]); 队列中间件 单独放里面或者在外指定都可以</p>
                    <p class="wa-txt">之前测试跑的多的有丢 加上中间件会好点 刚测没丢</p>
                    <p class="wa-txt">位置app\Jobs\Middleware</p>
                    <p class="wa-txt">Bus::chain队列链有一个失败就不跑了</p>
                    <p class="wa-txt">connection指定连接 queue队列名 tries最大失败重试次数</p>
                    <p class="wa-txt">在任务类里面定义 优先级高于外面命令行 高逼格名词 更加颗粒度的控制</p>
                    <p class="wa-txt">基于时间的尝试次数 指定时间内允许任务最大尝试数 retryUntil </p>
                    <p class="wa-txt">最大异常数 $maxExceptions</p>
                    <p class="wa-txt">允许队列运行的最大时间 $timeout</p>
                    <p class="wa-txt">Supervisor是Linux系统中常用的进程守护程序</p>
                    <p class="wa-txt">before and after 处理任务之前和之后处理一下东西</p>
                    <p class="wa-txt">v2</p>
                </div>

            </div>
            <div class="box-footer text-center">

            </div>
        </div>
    </section>

    <script>
    </script>
@stop
