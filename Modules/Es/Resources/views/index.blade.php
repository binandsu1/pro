@extends('layouts.admin')
@section('content')
    <section class="content-header">
        <h1>
            Es
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Laravel </a></li>
            <li class="active">es</li>
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
                <div style="width: 70%;float: left">
                    <p class="wa-txt"><a target="_blank" href="http://124.70.81.74:9200/">es  http://124.70.81.74:9200 </a></p>
                    <p class="wa-txt"><a target="_blank" href="http://124.70.81.74:9100/">es-head  http://124.70.81.74:9100/ </a></p>
                    <p class="wa-txt"><a target="_blank" href="http://124.70.81.74:5601/kibana/app/dev_tools#/console">es-kibana  http://124.70.81.74:5601/kibana/app/dev_tools#/console 勿操作 </a></p>
                    <p class="wa-txt">基于lucene(搜索框架) hadoop作者</p>
                    <p class="wa-txt">采用restful Api标准的  高扩展和高可用性的 实时数据分析的全文搜索工具</p>
                    <p class="wa-txt">高扩展 添加节点非常简单 </p>
                    <p class="wa-txt">高可用 分布式每个节点都有部分 down一两个节点没有任何问题</p>
                    <p class="wa-txt">实时数据分析 实时搜索平台 支持pb级 搜索轻微延迟 1s</p>
                    <p class="wa-txt">cluster 集群 一个或者多个 node组织在一起</p>
                    <p class="wa-txt">node 节点 单个装有es的服务器</p>
                    <p class="wa-txt">index索引  拥有几分特征的文档的集合 对应 database</p>
                    <p class="wa-txt">type类型  一个索引中 可以定义一个或者多种类型 对应 table</p>
                    <p class="wa-txt">document 文档 一个可以被索引的基础信息单元 对应row 行数据 </p>
                    <p class="wa-txt">field 列 es最小的单位 相当于一个列 对应 column</p>
                    <p class="wa-txt">shards 分片 讲索引分成若干份</p>
                    <p class="wa-txt">replicas复制 将索引 cp一份或者多分</p>
                    <p class="wa-txt">正向索引 从文档到索引</p>
                    <p class="wa-txt">反向索引 从索引到文档</p>
                </div>

            </div>
            <div class="box-footer text-center">

            </div>
        </div>
    </section>

    <script>
    </script>
@stop
