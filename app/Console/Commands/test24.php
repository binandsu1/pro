<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Swoole\WebSocket\Server;

class test24 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'yan:test24 {--user=ss} {--target=para} {--arr=*}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '24号测试脚本';

    public function handle()
    {

        $server = new Server("0.0.0.0", 9501);

        //连接成功回调
        $server->on('open', function (\Swoole\WebSocket\Server $server, $request) {
            $this->info($request->fd . '链接成功');
        });

        //收到消息回调
        $server->on('message', function (\Swoole\WebSocket\Server $server, $frame) {
            $content = $frame->data;

            //推送给所有链接
            foreach ($server->connections as $fd){
                $server->push($fd,$content);
            }
        });

        //关闭链接回调
        $server->on('close', function ($ser, $fd) {
            $this->info($fd . '断开链接');
        });

        $server->start();
    }
}
