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
                    <p class="wa-txt">配置文件config/queue里</p>
                    <p class="wa-txt"></p>
                    <p class="wa-txt"></p>
                    <p class="wa-txt"></p>
                    <p class="wa-txt"></p>
                    <p class="wa-txt"></p>
                    <p class="wa-txt"></p>
                    <p class="wa-txt"></p>
                    <p class="wa-txt"></p>
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
