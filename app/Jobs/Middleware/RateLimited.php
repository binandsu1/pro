<?php

namespace App\Jobs\Middleware;

use Illuminate\Support\Facades\Redis;

class RateLimited
{
    /**
     * Process the queued job.
     * 队列中间件 每两秒执行一次
     * @param  mixed  $job
     * @param  callable  $next
     * @return mixed
     */
    public function handle($job, $next)
    {
        Redis::throttle('key')->allow(1)->every(2)->then(function () use ($job, $next) {
                $next($job);
            }, function () use ($job) {
//            这个是干啥的？？？？？ 5秒后重新假如队列？？？？？？？
                $job->release(5);
            });


    }
}
