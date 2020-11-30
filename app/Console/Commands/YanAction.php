<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class YanAction extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
#
    #./artisan yan:action --target=sssssssssssssss  也可以自己穿 明天把脚本全部研究明白

    protected $signature = 'yan:test {--target=para}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '脚本写法test';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $target = $this->option('target');
        $this->info($target);
        $this->line($target);
        $this->error($target);
        #提问
        $this->ask('What is your name?');
        #是否确认执行
        if ($this->confirm('Do you wish to continue? [y|N]')) {
            $this->info('你选择了是');
        }
        #选择城市
        $city = $this->choice('你来自哪个城市', [
            '北京', '杭州', '深圳'
        ], 0);
        #选择城市
        $city = $this->anticipate('你来自哪个城市', [
            "北京",
            "杭州",
            "深圳"
        ]);

        #输入密码
        $password = $this->secret('输入密码才能执行此命令');
        if($password != 123){
            exit(-1);
        }

        #进度条 花里胡哨
        $bar = $this->output->createProgressBar(10);
        $bar->start();

        for ($i=0;$i<10;$i++){
            sleep(1);
            $bar->advance();
        }
        $bar->finish();

    }
}
