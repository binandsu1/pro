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
              <a class="btn btn-app" target="_blank" href="https://www.showdoc.com.cn/1512186054190030/7287502298332912">
                <i class="glyphicon glyphicon-dashboard"></i> 在线文档
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
              <a class="btn btn-app" href="{{route('laravel.system.admin')}}">
                <i class="fa fa-user"></i> 管理员
              </a>
                <a class="btn btn-app" href="https://console.huaweicloud.com/lcs/?region=cn-north-4#/lcs/manager/vmList" target="_blank">
                    <i class="fa fa-calendar"></i> 服务器
                </a>
              <a class="btn btn-app" href="http://124.70.81.74:8080/" target="_blank">
                <i class="fa fa-graduation-cap"></i> Jenkins
              </a>
              {{--<a class="btn btn-app" href="">--}}
                {{--<i class="fa fa-user-plus"></i> 潜在用户--}}
              {{--</a>--}}
              <a class="btn btn-app" href="http://124.70.81.74:15672/#/queues" target="_blank">
                <i class="fa fa-child"></i> Rabbimq
              </a>

              <a class="btn btn-app" href="{{route('admin.mongo.list')}}">
                <i class="fa fa-calendar-check-o"></i> Mongo
              </a>
              <a class="btn btn-app" href="{{route('laravel.total.z')}}">
                <i class="fa fa-cubes"></i> Layer
              </a>
              <a class="btn btn-app" href="{{route('laravel.total.b')}}">
                <i class="fa fa-list"></i> Vue
              </a>
                <a class="btn btn-app" href="{{route('laravel.system.log')}}">
                    <i class="fa fa-cogs"></i> 操作日志
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
                  <h3 class="box-title fw300"><small>支付宝小额赞助~</small></h3>
                </div>
                <div class="box-body" style="min-height:310px;max-height:310px;overflow:auto;">
                    <img src="<?=static_url('admin/img/zfb3.png')?>" style="margin-left: 50px" width="280px" height="280px"/>
                </div>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title fw300"><small>微信小额赞助~</small></h3>
                </div>
                <div class="box-body" style="min-height:310px;max-height:310px;overflow:auto;">
                    <img src="<?=static_url('admin/img/wx1.png')?>" style="margin-left: 50px" width="280px" height="280px"/>
                </div>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title fw300"><small>赞助列表   &nbsp;  </small></h3>
                </div>
                <div class="box-body" style="min-height:310px;max-height:310px;overflow:auto;">
                    <ul class="layui-timeline" id="LAY_demo1" >
                    </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <script>
        layui.use('flow', function(){
            var flow = layui.flow;
            flow.load({
                elem: '#LAY_demo1' //流加载容器
                ,scrollElem: '#LAY_demo1' //滚动条所在元素，一般不用填，此处只是演示需要。
                ,done: function(page, next){ //执行下一页的回调
                    //模拟数据插入
                    setTimeout(function(){
                        var lis = [];
                        var url = "<?=route('laravel.system.money')?>";
                         var para = { 'page':page}
                        $.get(url,para, function (xhr) {
                            layui.each(xhr.data, function(index, item){
                                str = '';
                                str += '<li class="layui-timeline-item"> ' ;
                                if(index == 0 && page ==1){
                                    str +=  '<i class="layui-icon layui-timeline-axis"></i>';
                                }else{
                                    str +=  '<i class="layui-icon layui-timeline-axis"></i> ';
                                }
                                str +=  '<div class="layui-timeline-content layui-text"> ' +
                                    '<div class="layui-timeline-title" style="font-size: 11px">' +
                                    item.time + ' '+  item.name+' 贡献 0.01 元 累计贡献<span class="id-txt"> '+ item.num +'</span> 次 </div>    ' +
                                    '</div>  ' +
                                    '</li>'
                                lis.push(str)
                            });
                            //执行下一页渲染，第二参数为：满足“加载更多”的条件，即后面仍有分页
                            //pages为Ajax返回的总页数，只有当前页小于总页数的情况下，才会继续出现加载更多
                            next(lis.join(''), page  < xhr.last_page); //假设总页数为 10
                        });
                    }, 500);
                }
            });

        });
    </script>


@stop
