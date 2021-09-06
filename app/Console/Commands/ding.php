<?php

namespace App\Console\Commands;

use App\Models\aaa;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class ding extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'yan:ding';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '定时器啦啦啦';

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
    public function handle(aaa $amodel)
    {
        $data["name"] = rand();
        $data["age"] = rand(3,10);
        $amodel::create($data);
        $this->info('我是定时器哈哈哈');
        $this->info('时间'.time());
    }
}
