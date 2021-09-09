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
    protected $signature = 'yan:swoole {--user=ss} {--target=para} {--arr=*}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '24号测试脚本';

    public function handle()
    {
        #0000开放所有客户端
        $server = new Server("0.0.0.0", 9501, SWOOLE_PROCESS, SWOOLE_SOCK_TCP | SWOOLE_SSL);

        $server->set([
            'daemonize' => false, //守护进程化。
            //配置SSL证书和密钥路径
            'ssl_cert_file' => "/etc/letsencrypt/live/www.yyjadmin.com/fullchain.pem",
            'ssl_key_file'  => "/etc/letsencrypt/live/www.yyjadmin.com/privkey.pem"
        ]);

        //连接成功回调
        $server->on('open', function (\Swoole\WebSocket\Server $server, $request) {
            $this->info($request->fd . '链接成功');
        });
//        ssl_certificate /etc/letsencrypt/live/www.yyjadmin.com/fullchain.pem;
//        ssl_certificate_key  /etc/letsencrypt/live/www.yyjadmin.com/privkey.pem;



        //收到消息回调 1 参数 server 2 数据帧
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
        #启动服务端
        $server->start();
    }
}
