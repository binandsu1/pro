@extends('layouts.admin')
@section('content')
    <section class="content-header">
        <h1>
            Es-索引列表
        </h1>

        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Laravel </a></li>
            <li class="active">es-索引列表</li>
        </ol>
    </section>
    <section class="content" id="px">
        <div class="box box-solid">
            <div class="box-header with-border">
                <span class=""><a  target="_blank" href="https://www.elastic.co/guide/cn/elasticsearch/php/current/_index_management_operations.html" >add api 参数很多</a>  </span>
                <div class="box-tools pull-center" >
                    <input type="text"   v-model="name">
                    <button class='btn btn-sm btn-success' v-on:click="ttt" ><i class="fa fa-plus"></i>
                        添加索引</button>
                </div>
            </div>


            <div class="box-footer text-center">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th width="5%" class="tcc ">索引Id</th>
                        <th width="5%" class="tcc">索引名称</th>
                        <th width="5%" class="tcc">number_of_shards(分片数)</th>
                        <th width="5%" class="tcc">number_of_replicas(副本数)</th>
                        <th width="5%" class="tcc">version</th>
                        <th width="5%" class="tcc">creation_date</th>
                        <th width="5%" class="tcc">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($alist as $key=>$val)
                            <tr>
                                <td class="tcc id-txt"> {{$val["uuid"]}} </td>
                                <td class="tcc "> {{$val["provided_name"]}} </td>
                                <td class="tcc ">{{$val["number_of_shards"]}}</td>
                                <td class="tcc ">  {{$val["number_of_replicas"]}} </td>
                                <td class="tcc ">  {{$val["version"]["created"]}} </td>
                                <td class="tcc ">  {{$val["creation_date"]}} </td>
                                <td class="tcc ">
                                    <button class="btn btn-xs btn-danger" title="确定要删除数据" v-on:click="delindex('{{$val["provided_name"]}}')"  > <i class="fa fa-trash"></i> 删除索引 </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </section>

    <script>
        var vm = new Vue({
            el: '#px',
            data(){
                return {
                    name: ''
                }
            },
            methods: {
                ttt:function (){
                    if(vm.name == ''){
                        layer.msg('索引名称不能为空');
                    }
                    var apiUrl = '<?=route('laravel.es.index-add')?>';
                    var params = {
                        'name' : vm.name
                    }
                    $.get(apiUrl,params,function (xhr) {
                        if(xhr.shards_acknowledged){
                            layer.msg('添加成功');
                        }else{
                            layer.msg('添加失败');
                        }
                        location.reload();
                        console.log(xhr);
                    }, 'json')

                },
                delindex:function (name){
                    var delUrl = '<?=route('laravel.es.index-del')?>';

                    var delparams = {
                        'name' : name
                    }
                    $.get(delUrl,delparams,function (xhr) {
                        if(xhr.acknowledged){
                            layer.msg('删除成功');
                        }else{
                            layer.msg('删除失败');
                        }
                        location.reload();
                        console.log(xhr);
                    }, 'json')

                }

            }

        })

    </script>
@stop
