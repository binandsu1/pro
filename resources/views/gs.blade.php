@extends('layouts.admin')
@section('content')
    <section class="content-header">
        <h1>

        </h1>
        <ol class="breadcrumb">

        </ol>
    </section>
    <section class="content">
        <div class="box box-solid">

            <div class="box-header with-border">
                <span class="box-title">

                </span>
                <div class="box-tools pull-right">
                </div>
            </div>

            <div class="no-padding box-body" style="overflow:hidden;">

                <table class="table table-bordered">

                    <tbody>
                    @if(!$list->isEmpty())
                        @foreach($list as $item)
                            <tr>
                                <td class=" " style="width: 30%" title="{{$item->title}}"> {!! str_replace(request('_value'), "<span class='dt-txt'>".request('_value').'</span>', $item->title) !!} </td>
                               @if(!empty($item->name))
                                <td class="" style="width: 30%" title="{{$item->name}}"> {!! str_replace(request('_value'), "<span class='dt-txt'>".request('_value').'</span>', $item->name) !!} </td>
                                @endif
                                    <td class=" " style="width: 40%" title="{{$item->desc}}">  {!! str_replace(request('_value'), "<span class='dt-txt'>".request('_value').'</span>', $item->desc) !!} </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
            <div class="box-footer text-center">
                @if(!$list->empty())
                    {{$list->links()}}
                @endif
            </div>
        </div>
    </section>

@stop
