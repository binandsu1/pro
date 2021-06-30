<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Modules\Curd\Models\XdoData;
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

    /**
     * Create a new command instance.
     *
     * @return void
     */


    /**
     * Execute the console command.
     *
     * @param XdoData $user_class
     * @return int
     */
    public function handle()
    {

        $this->info("\n所有任务执行完毕!");die;
        $fd = 1; // Find fd by userId from a map [userId=>fd].
        /**@var \Swoole\WebSocket\Server $swoole */
        $swoole = new Server();
        dd($swoole);
        $success = $swoole->push($fd, 'Push data to fd#1 in Controller');
        var_dump($success);

//        dd($user_class->get());
//            $headers = ['Name', 'Email'];
//            $users = $user_class::get(['id', 'name'])->toArray();
//            $this->table($headers, $users);
//
//        $users = $user_class::all();
//
//        $bar = $this->output->createProgressBar(count($users));
//
//        $bar->start();
//
//        foreach ($users as $user) {
//            sleep(3);   // 模拟执行耗时任务
//            $bar->advance();
//        }
//
//        $bar->finish();
        $this->info("\n所有任务执行完毕!");

//        $all = $this->option();
//        dd($all);
//        $user = $this->option('user');
//        $target = $this->option('target');
//        $arr = $this->option('arr');
//        $this->info("user=".$user."--target=".$target);
//       dd($arr);
//        $a = $user_class->find(2);
//        $a->name = $target;
//        $a->save();
////        dd($user_class->get());
//        $this->info("1");
//        $this->line("2");
//        $this->error("3");
    }
}
