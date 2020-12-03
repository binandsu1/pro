<?php

namespace App\Jobs;

use App\Jobs\Middleware\RateLimited;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Redis;

class UserJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    #最大重试次数
    public $tries = 3;
    #最大执行时间
    public $timeout = 600;
    protected  $i;

    public function __construct($i)
    {
        $this->connection = 'rabbitmq';
        $this->queue = 'YanUserJob';
        $this->i = $i;
    }
//
//    public function middleware()
//    {
//        return [new RateLimited];
//    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
//        Redis::throttle('key')->allow(1)->every(2)->then(function () {
//            $JobService = app('xdo.job-data');
//            $log = $JobService->process($this->i);
//            info('Lock obtained...');
//        }, function () {
//            return $this->release(5);
//        });

            $JobService = app('xdo.job-data');
            $log = $JobService->process($this->i);

    }
}
