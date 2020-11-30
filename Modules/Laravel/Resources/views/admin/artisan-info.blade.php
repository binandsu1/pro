@extends('layouts.admin')
@section('content')
    <section class="content-header">
        <h1>
            脚本介绍
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Laravel </a></li>
            <li class="active">Laravel常用</li>
            <li class="active">脚本介绍</li>
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
                <div style="width: 50%;float: left">
                    <p class="wa-txt">创建命令 ./artisan make:command test24  目录app/Console/Commands下</p>
                    <p class="wa-txt">signature 定义输入命令参数 $signature = 'yan:test24 {--user=x} {--target=para}' {--arr=*};</p>
                    <p class="wa-txt">description 脚本介绍</p>
                    <p class="wa-txt">构造函数 或 handle 方法中依赖注入  闭包？ </p>
                    <p class="wa-txt id-txt">控制器里直接执行脚本 Artisan::call('yan:test24',['--target'=>'cccccc']); 无法显示</p>
                    <p class="wa-txt">询问$this->ask('What is your name?') </p>
                    <p class="wa-txt">询问不显示密码$this->secret('What is the password?') </p>
                    <p class="wa-txt">yes or no $this->confirm('Do you wish to continue? [y|N]') </p>
                    <p class="wa-txt">可以选择 $this->anticipate('What is your name?', ['Taylor', 'Dayle'])</p>
                    <p class="wa-txt">常规输出 $this->info | $this->error | $this->line 常规输出 </p>
                    <p class="wa-txt">table 和 进度条 文档查看</p>
                    <p class="wa-txt">https://xueyuanjun.com/post/21998 </p>
                </div>

            </div>
            <div class="box-footer text-center">

            </div>
        </div>
    </section>

    <script>
    </script>
@stop
