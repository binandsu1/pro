@extends('layouts.admin')
@section('content')
    <section class="content-header">
      <h1>
        <small>   </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/admin"><i class="fa fa-dashboard"></i> 首页</a></li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-sm-12">
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title fw300"><small>快捷导航</small></h3>
            </div>
            <div class="box-body text-center">
              <a class="btn btn-app" href="{{route('admin.menu')}}">
                <i class="fa fa-refresh"></i> 目录脚本
              </a>
              @if($data->status == 2)
              <a class="btn btn-app" href="{{route('admin.debug-status',['status'=>1])}}">
                <i class="glyphicon glyphicon-eye-open"></i> 调试模式
              </a>
              @endif
              @if($data->status == 1)
              <a class="btn btn-app" href="{{route('admin.debug-status',['status'=>2])}}">
                <i class="glyphicon glyphicon-eye-close"></i> 关闭调试
              </a>
              @endif
              <a class="btn btn-app" href="{{route('admin.laravel.question')}}">
                <i class="fa fa-list"></i> 常用问题
              </a>
              <a class="btn btn-app" href="{{route('admin.laravel.functions')}}">
                <i class="fa fa-tag"></i> 常用函数
              </a>
              <a class="btn btn-app" href="">
                <i class="fa fa-user"></i> 管理员
              </a>
              <a class="btn btn-app" href="">
                <i class="fa fa-graduation-cap"></i> 老师管理
              </a>
              {{--<a class="btn btn-app" href="">--}}
                {{--<i class="fa fa-user-plus"></i> 潜在用户--}}
              {{--</a>--}}
              <a class="btn btn-app" href="">
                <i class="fa fa-child"></i> 付费用户
              </a>
              <a class="btn btn-app" href="">
                <i class="fa fa-calendar"></i> 排课总揽
              </a>
              <a class="btn btn-app" href="">
                <i class="fa fa-calendar-check-o"></i> 今日排课
              </a>
              <a class="btn btn-app" href="">
                <i class="fa fa-cogs"></i> 操作日志
              </a>
              <a class="btn btn-app" href="">
                <i class="fa fa-cubes"></i> 宣传资料
              </a>
              <a class="btn btn-app" href="">
                <i class="fa fa-list"></i> 组织架构
              </a>
            </div>
          </div>
        </div>
        <div class="col-sm-12">
          <div class="row">
            <div class="col-sm-6">
              <!-- 今日小班课 -->
            </div>
            <div class="col-sm-6">
              <!-- 今日大班课 -->
            </div>
          </div>
        </div>
        <div class="col-sm-12">
          <div class="row">
            <div class="col-sm-4">
              <div class="box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title fw300"><small>布局</small></h3>
                </div>
                <div class="box-body" style="min-height:310px;max-height:310px;overflow:auto;">
                </div>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title fw300"><small>布局</small></h3>
                </div>
                <div class="box-body" style="min-height:310px;max-height:310px;overflow:auto;">
                </div>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title fw300"><small>布局</small></h3>
                </div>
                <div class="box-body" style="min-height:310px;max-height:310px;overflow:auto;">

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
@stop
