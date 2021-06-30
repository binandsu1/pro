@extends('layouts.admin')
@section('content')
    <section class="content-header">
        <h1>
            数据列表 - 横
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Laravel </a></li>
            <li class="active">基础页面</li>
            <li class="active">数据列表</li>
            <li class="active">横</li>
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

            <div class="no-padding box-body" style="overflow: auto; width: 100%;">
                <div id="div1"></div>
<br>
<br>
<br>
<br>
                    测试一下啊：<input type="text" value="" id="test">&nbsp;
                    <input type="button" value="发送" class='btn btn-sm btn-success' id="bt">


            </div>
            <div class="box-footer text-center">

            </div>
        </div>
    </section>

    <script>
        var wsServer = 'ws://124.70.81.74:9501';
        var websocket = new WebSocket(wsServer);
        websocket.onopen = function (evt) {
            console.log("Connected to WebSocket server.");
        };

        websocket.onclose = function (evt) {
            console.log("Disconnected");
        };

        websocket.onmessage = function (evt) {
            div1.innerHTML+=evt.data+'<br>';
        };

        websocket.onerror = function (evt, e) {
            console.log('Error occured: ' + evt.data);
        };

        var bt = document.getElementById("bt");
        var test = document.getElementById("test");
        bt.onclick=function(){
            websocket.send(test.value);
        };
    </script>
@stop

