<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UserJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    #最大重试次数
    public $tries = 3;
    #最大执行时间
    public $timeout = 60;
    protected  $i;

    public function __construct($i)
    {
        $this->connection = 'rabbitmq';
        $this->queue = 'YanUserJob';
        $this->i = $i;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $JobService = app('xdo.job-data');
        $log = $JobService->process($this->i);
        return $log;
    }
}
