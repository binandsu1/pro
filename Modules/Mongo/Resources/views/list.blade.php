@extends('layouts.admin')
@section('content')
    <section class="content-header">
        <h1>
            mongo 数据
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> mongo </a></li>
            <li class="active">数据</li>
        </ol>
    </section>
    <section class="content">
        <div class="box box-solid">
            <div class="box-header with-border">
                <span class="">
                    数组总计 {{$list->total()}} 条  成功 {{$total_arr["success"]}} 条   &nbsp;  失败 {{$total_arr["error"]}} 条
                </span>
                <div class="box-tools pull-right">
                    <a class='btn btn-sm btn-success xdo-remote-form'
                       href="{{route('admin.mongo.mongo-add')}}"><i class="fa fa-plus"></i>
                        队列压数据</a>
                </div>
            </div>

            <div class="no-padding box-body" style="overflow:hidden;">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th width="10%" class="tcc ">ID</th>
                        <th width="8%" class="tcc">name</th>
                        <th width="8%" class="tcc">roundA</th>
                        <th width="8%" class="tcc">roundB</th>
                        <th width="8%" class="tcc">roundC</th>
                        <th width="8%" class="tcc">roundD</th>
                        <th width="8%" class="tcc">roundE</th>
                        <th width="8%" class="tcc">roundF</th>
                        <th width="8%" class="tcc">roundG</th>
                        <th width="8%" class="tcc">roundH</th>
                        <th width="5%" class="tcc">状态</th>
                        <th width="15%" class="tcc">时间</th>
                    </tr>

                    </thead>
                    <tbody>
                    @if(!$list->isEmpty())
                        @foreach($list as $item)
                            <tr>
                                <td class="tcc id-txt"> {{$item->_id}} </td>
                                <td class="tcc">  {{$item->name}} </td>
                                <td class="tcc">  {{$item->roundA}} </td>
                                <td class="tcc">  {{$item->roundB}} </td>
                                <td class="tcc">  {{$item->roundC}} </td>
                                <td class="tcc">  {{$item->roundD}} </td>
                                <td class="tcc">  {{$item->roundE}} </td>
                                <td class="tcc">  {{$item->roundF}} </td>
                                <td class="tcc">  {{$item->roundG}} </td>
                                <td class="tcc">  {{$item->roundH}} </td>
                                @if($item->is_over == 1)
                                <td class="tcc" style="color: green"> sucess  </td>
                                @else
                                    <td class="tcc id-txt"> error</td>
                                @endif
                                <td class="tcc">  {{$item->updated_at}} </td>
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
    </section>
@stop
