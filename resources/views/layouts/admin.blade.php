<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>学大在线管理后台</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
{{--<?php if (is_prod()) : ?>--}}
{{--<!--<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">-->--}}
    {{--<?php endif; ?>--}}
    <link rel="stylesheet" href="<?=static_url("/libs/bootstrap/css/bootstrap.min.css", true)?>"/>
    <link rel="stylesheet" href="<?=static_url("/libs/bootstrap/css/tag.css", true)?>">
    <link rel="stylesheet" href="<?=static_url("/libs/font-awesome/css/font-awesome.min.css")?>"/>
    <link rel="stylesheet" href="<?=static_url("/libs/select2/css/select2.min.css", true)?>"/>
    <link rel="stylesheet" href="<?=static_url('/admin/css/AdminLTE.css?1', true)?>"/>
    <link rel="stylesheet" href="<?=static_url('/admin/css/skins/_all-skins.min.css', true)?>"/>
    <link rel="stylesheet" href="<?=static_url("/libs/morris.js/morris.css", true)?>"/>
    <link rel="stylesheet" href="<?=static_url("/libs/datetime-picker/css/bootstrap-datetimepicker.css", true)?>"/>
    <link rel="stylesheet" href="<?=static_url("/libs/iCheck/minimal/_all.css", true)?>">
    <link rel="stylesheet" href="<?=static_url("/libs/jquery-treetable/css/treetable.css", true)?>">
    <link rel="stylesheet" href="<?=static_url("/libs/layer/theme/default/layer.css", true)?>">
    <link rel="stylesheet" href="<?=static_url("/libs/jquery-treetable/css/theme.mysite.css", true)?>">
    <link rel="stylesheet" href="<?=static_url("/libs/webuploader/webuploader.css", true)?>"/>


    <!--<link rel="stylesheet" href="/static/admin/css/xdo.css?v=17">-->
    <!--<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
      -->
    <script src="<?=static_url("/libs/jquery/dist/jquery.min.js", true)?>"></script>
    <script src="<?=static_url("/libs/jquery-form/jquery.form.min.js", true)?>"></script>
    <script src="<?=static_url("/libs/jquery-ui/jquery-ui.min.js", true)?>"></script>
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>
    <script src="<?=static_url("/libs/vue/vue.min.js", true)?>"></script>
    <script src="<?=static_url("/libs/bootstrap/js/bootstrap.min.js", true)?>"></script>
    <script src="<?=static_url("/libs/bootstrap/js/tagsinput.js", true)?>"></script>
    <script src="<?=static_url("/libs/iCheck/icheck.min.js", true)?>"></script>
    <script src="<?=static_url("/libs/moment/min/moment.min.js", true)?>"></script>
    <script src="<?=static_url("/libs/moment/locale/zh-cn.js", true)?>"></script>
    <script src="<?=static_url("/libs/ueditor/ueditor.config.js")?>"></script>
    <script src="<?=static_url("/libs/ueditor/ueditor.all.js")?>"></script>
    <!--<script src="/static/libs/bootstrap-daterangepicker/daterangepicker.js"></script>-->
    <!--<script src="/static/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>-->
    <script src="<?=static_url("/libs/datetime-picker/js/bootstrap-datetimepicker.min.js", true)?>"></script>
    <script src="<?=static_url("/libs/jquery-slimscroll/jquery.slimscroll.min.js", true)?>"></script>
    <script src="<?=static_url("/libs/layer/layer.js", true)?>"></script>
    <!--<script src="/static/libs/fastclick/lib/fastclick.js"></script>-->
    <script src="<?=static_url('/admin/js/adminlte.min.js', true)?>"></script>
    <script src="<?=static_url("/libs/jquery-treetable/jquery.treetable.js", true)?>"></script>
    <script src="<?=static_url("/libs/select2/js/select2.full.min.js", true)?>"></script>
    <script src="<?=static_url("/libs/webuploader/webuploader.js", true)?>"></script>
    <script src="<?=static_url('/admin/js/xdo.js?v=20200717', true)?>"></script>


    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style style="text/css">
        html,
        body,
        #app {
            height: 100% !important;
            /*font-size: 16px;*/
        }

        body,
        input,
        textarea {
            font-size: 12px;
        }

        .tcc {
            text-align: center !important;
            vertical-align: middle !important;
        }

        .tc {
            vertical-align: middle !important;
        }

        .cc {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .no-padding-lr {
            padding-left: 0 !important;
            padding-right: 0 !important;
        }

        .no-padding-r {
            padding-right: 0 !important
        }

        .no-padding-l {
            padding-left: 0 !important
        }

        .p0 {
            padding: 0px;
        }

        .fs11 {
            font-size: 11px !important;
        }

        .fs13 {
            font-size: 13px !important;
        }

        .p1 {
            padding: 7.5px;
        }

        .p2 {
            padding: 15px;
        }

        .p3 {
            padding: 22.5px;
        }

        .p4 {
            padding: 30px;
        }

        .m0 {
            margin: 0px;
        }

        .m {
            margin: 2px;
        }

        .m-1 {
            margin: 7.5px;
        }

        .ml-1 {
            margin-left: 7.5px;
        }

        .m-2 {
            margin: 15px;
        }

        .m-3 {
            margin: 22.5px;
        }

        .m-4 {
            margin: 30px;
        }

        .ml-1 {
            margin-left: 7.5px;
        }

        .ml-2 {
            margin-left: 15px;
        }

        .ml-3 {
            margin-left: 22.5px;
        }

        .ml-4 {
            margin-left: 40px;
        }

        .mr-1 {
            margin-right: 7.5px;
        }

        .mt-1 {
            margin-top: 7.5px;
        }

        .fw600 {
            font-weight: 600;
        }

        .fw300 {
            font-weight: 300;
        }

        .fw200 {
            font-weight: 200;
        }

        .fw100 {
            font-weight: 100;
        }

        .wf4,
        .wf5,
        .wf6,
        .wf7,
        .wf8 {
            text-align: center;
        }

        .wf4 {
            width: 4em !important;
        }

        .wf5 {
            width: 5em !important;
        }

        .wf6 {
            width: 6em !important;
        }

        .wf7 {
            width: 7em !important;
        }

        .wf8 {
            width: 8em !important;
        }

        .wf10 {
            width: 10em !important;
        }

        .id-txt {
            font-family: "Lucida Sans", "Lucida Sans Regular", "Lucida Grande",
            "Lucida Sans Unicode", Geneva, Verdana, sans-serif;
            color: #d84315;
            /*(background-color: #f5f5f5;*/
            font-size: 0.9em;
        }

        .price-txt {
            font-family: "Lucida Sans", "Lucida Sans Regular", "Lucida Grande",
            "Lucida Sans Unicode", Geneva, Verdana, sans-serif;
            color: #ff6d00;

            /* background-color: #f5f5f5; */
            font-size: 0.9em;

        }

        .account-txt {
            font-size: 0.9em;
            color: #1b5e20;
        }

        .email-txt {
            font-size: 0.9em;
            color: #1a237e;
        }

        .mobile-txt {
            font-size: 0.9em;
            color: #263238;
        }

        .dt-txt {
            font-size: 0.9em;
            color: #ff5722;
        }

        .z-txt {
        font-size: 0.9em;
        color: #D52BB3;
        }

        .h-txt {
        font-size: 0.9em;
        color: #DDDD00;
        }

        .wa-txt {
        font-size: 0.9em;
        padding: 0.3em 1.8em 0.2em;
        font-size: 65% !important;
        color: green;
        }

        .sl-txt {
        font-size: 0.9em;
        font-weight: 200;
        padding: 0.3em 1.3em 0.2em;
        font-size: 65% !important;
        color: red;
        }


        .tiny-txt {
            font-weight: 200;
            padding: 0.1em 0.4em 0.2em;
            font-size: 65% !important;
        }

        .avatar {
            border-radius: 100%;
            width: 128px;
            height: 128px;
        }

        .avatar.avatar-big {
            width: 194px;
            height: 194px;
        }

        .avatar.avatar-small {
            width: 64px;
            height: 64px;
        }

        .avatar.avatar-mini {
            width: 48px;
            height: 48px;
        }

        .avatar.avatar-tiny {
            width: 32px;
            height: 32px;
        }

        td.options {
            text-align: right;
        }

        td.options a.btn,
        td.options button.btn {
            margin: 0px 3px;
        }

        .table.table-data > tbody > tr > td {
            vertical-align: middle;
        }

        /* 增加一行显示 */
        .textnowrap {
            max-width: 140px;
            text-align: right;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .text-overflow {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        @media (min-width: 768px) {
            .modal-dialog {
                margin: 120px auto;
            }
        }

        .display-4 {
            font-size: 6em;
        }

        .weight200 {
            font-weight: 200;
        }

        .border {
            border: 1px solid #ddd;
        }

        .btn-dark {
            background-color: #474747;
            border-color: #222;
            color: #fff;
        }

        .c-hand {
            cursor: pointer;
        }

        .txt-b {
            font-weight: 600;
        }

        .select {
            outline: 1px solid rgb(204, 204, 204);
        }

        @media (min-width: 992px) {
            .modal-lgg {
                width: 1120px;
                margin: 80px auto;
            }
        }

        @media (min-width: 768px) {
            .modal-dialog {
                margin: 80px auto;
            }
        }

        .modal-header {
            padding: 10px 15px;
            border-bottom: 1px solid #e5e5e5;
        }

        .modal-header .close {
            line-height: 1.4;
        }

        .mh450 {
            min-height: 450px;
        }

        .bg-yellow-light {
            background-color: #fffde7;
        }

        .bd-yellow-light {
            border: 1px dashed #fff59d;
        }

        .rounded {
            border-radius: 6px;
        }

        .pagination {
            margin: 5px 0 !important;
        }

        .box.box-solid > .box-header .btn.btn-primary,
        .box.box-solid > .box-header a.btn-primary {
            background-color: #343434;
        }

        .box.box-solid > .box-header .btn.btn-primary:hover,
        .box.box-solid > .box-header a.btn-primary:hover {
            background-color: #5d5d5d;
        }

        .xdo-search-box {
            width: auto;
            border: 1px solid #fff9c4;
            background-color: #fffde7;
            box-shadow: none;
            margin-bottom: 5px;
        }

        .xdo-search-box .xdo-search-title {
            text-align: left;
            padding-top: 5px;
            color: #484848;
        }

        .xdo-search-box .xdo-search-btn-box {
            text-align: right;
            padding-top: 5px;
        }

        .xdo-search-box .xdo-search-plus-btn {
            background-color: transparent;
            outline: none !important;
        }

        .xdo-search-box .xdo-search-plus-btn:hover {
            background-color: transparent !important;
        }

        .xdo-search-box hr {
            margin: 8px 0px;
            border-top: 1px solid #efefef;
        }

        .xdo-search-box label {
            margin: 0px 5px;
            font-weight: 400;
        }

        /*
    .xdo-search-box button[type="reset"] {
      margin: 0px 5px;
    }
    .xdo-search-box button[type="submit"] {
      margin: 0px 5px;
    }*/

        .xdo-search-box input[type=text] {
            width: 8em;
            height: 26px;
            line-height: 100%;
            padding-left: 3px;
        }

        .xdo-search-box input[type=radio] {
            top: -2px;
        }

        .xdo-search-box input[type=checkbox] {
            top: -2px;
        }

        .xdo-search-box select {
            height: 26px;
            line-height: 100%;
            padding-left: 3px;
        }

        .xdo-search-box ._xdo-widget-qudao-select select {
            width: 10em !important;
        }

        .xdo-search-box .select2-container--default .select2-selection--single,
        .select2-selection .select2-selection--single {
            border: 1px solid #d2d6de;
            border-radius: 0;
            padding: 3px 12px;
            height: 26px;
        }

        .xdo-search-box .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 20px;
            right: 2px;
        }

        .xdo-search-box .btn {
            padding: 2px 10px;
        }

        .xdo-search-box select {
            padding: 0
        }

        label.control-label {
            font-weight: 400;
        }

        .hr-small {
            margin: 10px 0px;
        }

        .layui-layer-btn .layui-layer-btn0 {
            border-color: #343434 !important;
            background-color: #343434 !important;
            color: #fff;
        }

        .layui-layer-btn-c {
            background-color: #fafafa;
            padding-top: 5px;
            padding-bottom: 5px;
        }

        tr.unactive {
            background-color: #fafafa !important;
        }

        tr.unactive td {
            background-color: #fefeff !important;
            color: #c5cae9 !important;
        }

        table.table-inner {
            border: none;
            margin-bottom: 0px;
            margin-top: 0px;
        }

        .xdo-bg-avatar,
        .xdo-bg-avatar-small,
        .xdo-bg-avatar-middle,
        .xdo-bg-avatar-big {
            margin: 0px;
            border: 1px solid #efefef;
            background-clip: content-box;
            background-position: center center;
            background-size: cover;
            border-radius: 100%;
        }

        .xdo-bg-avatar-small {
            width: 48px;
            height: 48px;
        }

        .xdo-bg-avatar {
            width: 64px;
            height: 64px;
            margin: 0 auto;
        }

        .xdo-bg-avatar-middle {
            width: 96px;
            height: 96px;
        }

        .xdo-bg-avatar-big {
            width: 128px;
            height: 128px;
        }

        .nav-tabs-custom > .nav-tabs {
            background-color: #fafafa;
        }

        .nav-tabs-custom > .nav-tabs > li.active {
            border-top-color: #484848;
        }

        .nav-tabs-custom > .nav-tabs > li.active a {
            background-color: white;
        }

        .bg-dark {
            background-color: #fefefe;
        }

        .order_status_-2 {
            background-color: #6e6b41;
            color: white;
        }

        .order_status_-1 {
            background-color: #c7a252;
            color: white;
        }

        .order_status_0 {
            background-color: #f58220;
            color: white;
        }

        .order_status_1 {
            background-color: #77787b;
            color: white;
        }

        .order_status_2 {
            background-color: #1d953f;
            color: white;
        }

        .order_status_3 {
            background-color: #145b7d;
            color: white;
        }

        .order_status_6 {
            background-color: #840228;
            color: white;
        }

        .order_status_8 {
            background-color: #d71345;
            color: white;
        }

        .order_status_15 {
            background-color: #FFF68F;
            color: #7D7D7D;
        }

        .order_status_21 {
            background-color: #f8aba6;
            color: #222;
        }

        .team_status_1 {
            background-color: #77787b;
            color: #222;
        }

        .team_status_2 {
            background-color: #1d953f;
            color: #222;
        }

        .team_status_3 {
            background-color: #4A4AFF;
            color: #222;
        }

        .team_status_4 {
            background-color: #FF2D2D;
            color: #222;
        }

        .finance_record_status_1 {
            background-color: #d84315;
            color: #fefefe;
        }

        .finance_record_status_2 {
            background-color: #2e7d32;
            color: #fefefe;
        }

        .schedule_delete_0 {
            background-color: #1d953f;
            color: #fefefe;
        }

        .schedule_delete_1 {
            background-color: #d84315;
            color: #fefefe;
        }

        .schedule_status_1 {
            background-color: #145b7d;
            color: white;
        }

        .schedule_status_2 {
            background-color: #1d953f;
            color: white;
        }

        .schedule_status_3 {
            background-color: #d84315;
            color: white;
        }

        .schedule_status_4 {
            background-color: #77787b;
            color: white;
        }

        .recharge_status_2 {
            background-color: #2e7d32;
            color: white;
        }

        .recharge_status_3 {
            background-color: #d84315;
            color: white;
        }

        .user_status_0 {
            background-color: #C6A300;
            color: white;
        }

        .user_status_1 {
            background-color: #4B0091;
            color: white;
        }

        .user_status_2 {
            background-color: #00A600;
            color: white;
        }

        .course_status_1 {
            background-color: #2e7d32;
            color: #fff;
        }

        .course_status_2 {
            background-color: #d2d6de;
            color: #444;
        }

        .course_status_3 {
            background-color: #f57f17;
            color: #fff;
        }

        .course_status_4 {
            background-color: #d2d6de;
            color: #444;
        }

        .sms_send_status_1 {
            background-color: #d84315;
            color: #fff;
        }

        .sms_send_status_2 {
            background-color: #1d953f;
            color: #fff;
        }

        .xdbox-widget .widget-user-username {
            margin-left: 0
        }

        .xdo-remote-form-box {
            padding: 1em;
            max-height: 650px;
            overflow-x: hidden;
            overflow-y: auto
        }

        .xdo-pagination {
            border-radius: 2px;
        }

        .xdo-pagination > .active > a,
        .pagination > .active > a:focus,
        .pagination > .active > a:hover,
        .pagination > .active > span,
        .pagination > .active > span:focus,
        .pagination > .active > span:hover {
            background-color: #343434;
            border-color: #343434;
        }

        .xdo-pagination > .active > a,
        .pagination > .active > a:focus,
        .pagination > .active > a:hover,
        .pagination > .active > span,
        .pagination > .active > span:focus,
        .pagination > .active > span:hover {
            background-color: #343434;
            border-color: #343434;
        }

        .xdo-pagination > .active > a,
        .pagination > .active > a:focus,
        .pagination > .active > a:hover,
        .pagination > .active > span,
        .pagination > .active > span:focus,
        .pagination > .active > span:hover {
            background-color: #343434;
            border-color: #343434;
        }

        .xdo-pagination > .active > span:hover {
            background-color: #343434;
            border-color: #343434;
        }

        .xdo-pagination > li:first-child > a,
        .pagination > li:first-child > span {
            border-top-left-radius: 2px;
            border-bottom-left-radius: 2px;
        }

        .xdo-pagination > li:last-child > a,
        .pagination > li:last-child > span {
            border-top-right-radius: 2px;
            border-bottom-right-radius: 2px;
        }

        .xdo-pagination > li > a,
        .xdo-pagination > li > span {
            position: relative;
            padding: 4px 10px;
        }

        .xdo-mobile-box {
            width: 210;
            background-color: transparent;
            border-radius: 6px;
            height: 32px !important;
            padding-right: 3px !important;
            /*border:1px dashed #cfd8dc;*/
            color: #263238;
            display: inline-block;
        }

        .xdo-mobile-box .xdo-mobile-txt {
            display: inline-block;
            width: 110px;
            line-height: 32px;
            font-weight: 600;
            padding-left: 5px;
            font-size: 16px;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;

        {
        {
            --float: left
        ;
            --
        }
        }
        }

        .xdo-mobile-box .xdo-mobile-time {
            display: inline-block;
            line-height: 32px;
            width: 25px;
            padding: 0px 4px;
            font-size: 11px;
            color: #d50000;

        }

        .xdo-mobile-box .xdo-mobile-opt {
            display: inline-block;
            float: right;
        }

        .xdo-mobile-box .xdo-mobile-opt .btn {
            margin: 0px !important;
        }

        .layui-layer-xdo-primary .layui-layer-title {
            border: none;
            background-color: #263238;
            color: #fff;
        }

        .layui-layer-xdo-primary .layui-layer-btn-c {
            background-color: #fafafa;
        }

        textarea.form-control {
            background-color: #fffde7 !important;
            resize: none !important;
        }

        .form-control {
            background-color: #fefefe;
        }

        .xdo-single-uploader .xdo-single-uploader-img {
            margin: 0px;
            border: 1px solid #efefef;
            background-clip: content-box;
            background-position: center center;
            background-size: cover;
        }

        .xdo-single-uploader ._upload_process_outter {
            height: 2px;
            margin-bottom: 5px;
            padding: 0px;
        }

        .xdo-single-uploader ._upload_process {
            height: 100%;
            width: 0%;
            background-color: red;
        }

        .xdo-mutil-uploader {
        }

        .xdo-mutil-uploader .xdo-mutil-file-name {
            float: left;
            width: 20em;
            overflow: hidden;
            font-weight: 600;
        }

        .xdo-mutil-uploader ul li {
            padding: 5px 0px;
            border-bottom: 1px dotted #ccc;
            position: relative;
        }

        .xdo-mutil-uploader ul li:last-child {
            border-bottom: none;
        }

        .xdo-mutil-uploader ._upload_process {
            height: 1px;
            background-color: red;
            width: 0%;
            position: absolute;
            top: 0px;
            left: 0px;
        }

        .xdo-order-table th {
            background-color: #f1f1f1 !important;
            color: #484848;
            text-align: right !important;
        }

        .xdo-order-table th,
        .xdo-order-table td {
            padding: 3px !important;
            border: 1px solid #c1c1c1 !important;
        }

        .xdo-select-date-time {
        }

        .xdo-select-date-time .xdo-dt {
            font-size: 14px;
            font-weight: 900;
            color: #3f51b5;
        }

        .unsel {
            -moz-user-select: none;
            -webkit-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        /* 英文换行 */
        .word-wrap {
            word-wrap: break-word
        }

        .xdo-alert {
            color: #a94442;
            border: #ebccd1;
            background-color: #f2dede;
        }

        .select2-container--default .select2-selection--single,
        .select2-selection .select2-selection--single {
            border: 1px solid #d2d6de;
            border-radius: 0;
            padding: 6px 8px;
            height: 32px;
        }

        .nav-stacked > li > a.btn,
        a.btn-xs {
            padding: 1px 5px;
            font-size: 12px;
            line-height: 1.5;
            border-radius: 3px;
            display: inline-block;
        }

        .xdo-kefu1 b {
            -webkit-animation: changecolor1 1s linear infinite;
            animation: changecolor1 1s linear infinite;
        }

        @-webkit-keyframes changecolor1 {
            0% {
                color: #66bb6a;
            }

            50% {
                color: #388e3c;
            }

            100% {
                color: #1b5e20;
            }
        }

        @keyframes changecolor1 {
            0% {
                color: #66bb6a;
            }

            50% {
                color: #388e3c;
            }

            100% {
                color: #1b5e20;
            }
        }

        /* 头部客服 */
        .xdo-kefu b {
            -webkit-animation: changecolor 1s linear infinite;
            animation: changecolor 1s linear infinite;
        }

        @-webkit-keyframes changecolor {
            0% {
                color: #ef9a9a;
            }

            50% {
                color: #ef5350;
            }

            100% {
                color: #b71c1c;
            }
        }

        @keyframes changecolor {
            0% {
                color: #ef9a9a;
            }

            50% {
                color: #ef5350;
            }

            100% {
                color: #b71c1c;
            }
        }
    </style>
</head>

<body class="skin-black sidebar-mini wysihtml5-supported fixed">
<div class="wrapper">
    <div class="main-header">
        @include('admin::header')
    </div>
    <div class="main-sidebar">
        @include('admin::aside')
    </div>

    <div class="content-wrapper">

@if(getDebugStatus() == 1)
<div class="alert alert-warning alert-dismissible" style="margin:10px 10px 0px 10px;font-size:1.3em; font-size:14px;" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <?php
       echo getSqlShow();
    ?>
</div>
@endif

      <div class="alert alert-success alert-dismissible" style="margin:10px 10px 0px 10px;font-size:1.3em">
Laravel 8 peace && love - <a href="https://xueyuanjun.com/books/laravel-docs-8" target='_blank' style="text-decoration:none;">学院君</a>
- <a href="https://v3.bootcss.com/components/" target='_blank' style="text-decoration:none;">bootstrap </a>
</div>
      @yield('content')
    </div>
    <div class="main-footer">
        @include('admin::footer')
    </div>
    <aside class="control-sidebar control-sidebar-dark">
        @include('admin::aside-right')
    </aside>
    <div class="control-sidebar-bg">
    </div>
</div>


<div class="modal fade" tabindex="-1" role="dialog" id="baijiayun-box">
    <div class="modal-dialog" role="document" style="width:480px;margin: 180px auto;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center">进入教室</h4>
            </div>
            <div class="modal-body">
                <div class="row" id="_loading-class">
                    <div class="col-sm-12">
                        正在打开客户端....
                    </div>
                </div>
                <div class="row" style="display:none" id="_nav-class">
                    <div class="col-sm-12 text-center" style="font-size:16px;margin:8px 8px 14px 8px;">
                        如果未安装或不能打开客户端，请下载最新客户端，客户端观看直播更流畅，功能更强大。
                    </div>
                    <div class="col-sm-1"></div>
                    <div class="col-sm-5 cc text-center">
                        <a target="_blank" id="client-url" href="#" class="btn btn-primary">下载客户端</a>
                    </div>
                    <div class="col-sm-5 cc text-center">
                        <a target="_blank" id="web-url" href="#" class="btn btn-primary">网页进入教室</a>
                    </div>
                    <div class="col-sm-1"></div>
                </div>
            </div>
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div>

<script>

    $(function () {

        $('body').on('click', 'a[data-action=toRoom]', function (e) {
            var $classAction = $(this);
            if (!$classAction.hasClass('baijiayun')) {
                return
            }
            e.preventDefault()
            var $modalBox = $('#baijiayun-box');
            var $loadingClass = $('#_loading-class')
            var $navClass = $('#_nav-class')
            $modalBox.on('shown.bs.modal', function () {
                setTimeout(function () {
                    $loadingClass.hide();
                    $navClass.show();
                }, 3000)
            });
            $modalBox.on('hidden.bs.modal', function () {
                $loadingClass.show();
                $navClass.hide();
                $modalBox.find('#clien-url').attr('href', '#')
                $modalBox.find('#web-url').attr('href', '#')
            });

            var href = $classAction.attr('href');
            var loadTip = layer.load(2, {
                shade: [0.2, "#fff"]
            });
            $.get(href, function (xhr) {
                if (xhr.status == 9999) {
                    layer.close(loadTip);
                    var data = xhr.data;
                    var inClassClient = data.baijiayunRoomUrl.inClassClient;
                    var inClassWeb = data.baijiayunRoomUrl.inClassWeb;
                    var classInRoomUrl = data.classInRoomUrl;
                    var genseeRoomUrl = data.genseeRoomUrl;
                    if ($classAction.hasClass('baijiayun')) {
                        window.location.href = inClassClient
                        $modalBox.modal('show');
                        $modalBox.find('#clien-url').attr('href', inClassClient)
                        $modalBox.find('#web-url').attr('href', inClassWeb)
                    } else {

                    }
                } else {
                    layer.close(loadTip);
                    layer.msg(xhr.msg);
                }

            }).fail(function (xhr) {
                layer.close(loadTip);
                // TODO 失败
            })
        })
    });


</script>

</body>

</html>
