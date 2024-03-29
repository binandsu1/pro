@extends('layouts.admin')
@section('content')
    <section class="content-header">
        <h1>
            Es-文档列表
        </h1>

        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Laravel </a></li>
            <li class="active">es-文档列表</li>
        </ol>
    </section>
    <section class="content" id="px">
        <div class="box box-solid">

            <x-s :resetUrl="route('laravel.es.document-index')" >
                <div class="form-group">
                    <label class="control-label fw300"></label>
                    <input type="text" name="es" style="width:200px;"
                           class="form-control input-sm"
                           placeholder="es search" value="<?=request('es')?>">
                </div>


                @slot('more')
                @endslot
            </x-s>


            <div class="box-header with-border">
                <span class="">  &nbsp; </span>
                <div class="box-tools pull-center" >
                    <a class='btn btn-sm btn-success xdo-remote-form'
                       href="{{route('laravel.es.document-add')}}"><i class="fa fa-plus"></i>
                        添加文档</a>
                    <button class='btn btn-sm btn-success' onclick="pl()"><i class="fa fa-plus"></i>
                       批量添加</button>
                </div>
            </div>


            <div class="box-footer text-center">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th width="5%" class="tcc ">文档Id</th>
                        <th width="5%" class="tcc">索引</th>
                        <th width="5%" class="tcc">type</th>
                        <th width="5%" class="tcc">搜索评分</th>
                        <th width="5%" class="tcc">title</th>
                        <th width="5%" class="tcc">like</th>
                        <th width="5%" class="tcc">price</th>
                        <th width="15%" class="tcc">address</th>
                        <th width="10%" class="tcc">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($list as $key=>$val)
                            <tr>
                                <td class="tcc id-txt"> {{$val["_id"]}} </td>
                                <td class="tcc "> {{$val["_index"]}} </td>
                                <td class="tcc ">{{$val["_type"]}}</td>
                                <td class="tcc ">  {{$val["_score"]}} </td>
                                <td class="tcc "> {!! str_replace(request('es'), "<span class='dt-txt'>".request('es').'</span>', return_data_arr($val["_source"],'title')) !!}  </td>
                                <td class="tcc "> {!! str_replace(request('es'), "<span class='dt-txt'>".request('es').'</span>', return_data_arr($val["_source"],'like')) !!}   </td>
                                <td class="tcc ">  {!! str_replace(request('es'), "<span class='dt-txt'>".request('es').'</span>', return_data_arr($val["_source"],'price')) !!} </td>
                                <td class="tcc ">  {!! str_replace(request('es'), "<span class='dt-txt'>".request('es').'</span>', return_data_arr($val["_source"],'address')) !!} </td>
                                <td class="tcc ">
                                    <a class="btn btn-xs btn-success xdo-remote-form" href="{{route('laravel.es.document-edit',['id'=>$val["_id"],'index'=>$val["_index"],'type'=>$val["_type"]])}}"> <i class="fa fa-pencil"></i> 编辑 </a>
                                    <button class="btn btn-xs btn-danger" title="确定要删除数据" v-on:click="deldocument('{{$val["_index"]}}','{{$val["_type"]}}','{{$val["_id"]}}')"  > <i class="fa fa-trash"></i> 删除文档 </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </section>

    <script>
        function pl(){
            layer.msg('不是吧 不是吧 tm 单押也算押....');
        }
        var vm = new Vue({
            el: '#px',
            data(){
                return {
                    name: ''
                }
            },
            methods: {
                deldocument:function (index,type,id){
                    var delUrl = '<?=route('laravel.es.document-del')?>';

                    var delparams = {
                        'my_index' : index,
                        'my_type' : type,
                        'my_id' : id
                    }
                    $.get(delUrl,delparams,function (xhr) {
                        if(xhr._id){
                            // layer.msg('删除成功');
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
