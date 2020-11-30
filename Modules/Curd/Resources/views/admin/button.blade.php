@extends('layouts.admin')
@section('content')
    <section class="content-header">
        <h1>
             按钮样式
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Laravel </a></li>
            <li class="active">基础页面</li>
            <li class="active">数据列表</li>
            <li class="active">按钮样式</li>
        </ol>
    </section>
    <section class="content">
        <div class="box box-solid">
            <div class="box-header with-border">
                <span class="box-title">  </span>
                <div class="box-tools pull-center">
                    <a class='btn btn-sm btn-success' href=""><i class="fa fa-plus"></i> btn-success</a>
                    <a class='btn btn-sm btn-warning' href=""><i class="fa fa-plus"></i> btn-warning</a>
                    <a class='btn btn-sm btn-primary' href=""><i class="fa fa-plus"></i> btn-primary</a>
                    <a class='btn btn-sm btn-info' href=""><i class="fa fa-plus"></i> btn-info</a>
                    <a class='btn btn-sm btn-danger' href=""><i class="fa fa-plus"></i> btn-danger</a>
                    <x-button :route="route('admin.curd.button')" size="sm" type="btn-info"  icon="fa fa-plus"  bname="我是组件按钮" />
                </div>
            </div>
            <div class="no-padding box-body" style="overflow:hidden;"> <br>
                <xmp class="sl-txt"> 普通按钮示例 <a class='btn btn-sm btn-success' href=""><i class="fa fa-plus"></i> 添加 </a> </xmp>
                <xmp class="sl-txt"> 组件按钮动态传有权限控制 -- xmp解析不出源代码 代码内查看 </xmp>
                <xmp class="sl-txt"> route 链接 size 大小 type 类型 icon 图标 bname 名称 </xmp>
                <p class="wa-txt">按钮从小到大 btn-xs  btn-sm  btn-primary  btn-lg </p>
                <p class="wa-txt">按钮颜色name显示</p>
                <p class="wa-txt">https://www.runoob.com/bootstrap4/bootstrap4-buttons.html</p>
            </div>
            <div class="box-footer text-center">

            </div>
        </div>
    </section>

    <script>
    </script>
@stop
