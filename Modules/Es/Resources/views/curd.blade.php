@extends('layouts.admin')
@section('content')
    <section class="content-header">
        <h1>
            Es-curd
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Laravel </a></li>
            <li class="active">es-curd</li>
        </ol>
    </section>
    <section class="content">
        <div class="box box-solid">
            <div class="box-header with-border">
                <span class="box-title">  </span>
                <div class="box-tools pull-center">

                </div>
            </div>
            <div class="box-tools pull-center" style="overflow:hidden;"><br>
             </div>

            <div class="box-footer text-center">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th width="5%" class="tcc ">Id</th>
                        <th width="5%" class="tcc">_index</th>
                        <th width="5%" class="tcc">_type</th>
                        <th width="5%" class="tcc">title</th>
                        <th width="5%" class="tcc">age</th>
                        <th width="20%" class="tcc">text</th>
                        <th width="5%" class="tcc">_score</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(!$list->isEmpty())
                        @foreach($list as $item)
                            <tr>
                                <td class="tcc"> {{$item->_id}} </td>
                                <td class="tcc id-txt"> {{$item->_index}} </td>
                                <td class="tcc id-txt">{{$item->_type}}</td>
                                <td class="tcc ">  {{$item->title}} </td>
                                <td class="tcc ">  {{$item->age}} </td>
                                <td class="tcc ">  {{$item->text}} </td>
                                <td>  {{$item->_score}} </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>


            <div class="box-footer text-center">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th width="5%" class="tcc ">Id</th>
                        <th width="5%" class="tcc">_index</th>
                        <th width="5%" class="tcc">_type</th>
                        <th width="5%" class="tcc">title</th>
                        <th width="5%" class="tcc">age</th>
                        <th width="20%" class="tcc">text</th>
                        <th width="5%" class="tcc">_score</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(!$list->isEmpty())
                        @foreach($list as $item)
                            <tr>
                                <td class="tcc"> {{$item->_id}} </td>
                                <td class="tcc id-txt"> {{$item->_index}} </td>
                                <td class="tcc id-txt">{{$item->_type}}</td>
                                <td class="tcc ">  {{$item->title}} </td>
                                <td class="tcc ">  {{$item->age}} </td>
                                <td class="tcc ">  {{$item->text}} </td>
                                <td>  {{$item->_score}} </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <script>
    </script>
@stop
