<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CreateAction extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'yan:action {--target=init}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '自动生成菜单控制器';

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
        $function = $this->option('target');
        $this->$function();
    }

    public function init(){
        $this->info('开始操作');
        $XdoAction = app('xdo.action');
        $XdoAction->init();
        $this->info("结束");
    }
}
