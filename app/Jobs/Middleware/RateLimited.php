<?php

namespace App\Jobs\Middleware;

use Illuminate\Support\Facades\Redis;

class RateLimited
{
    /**
     * Process the queued job.
     *
     * @param  mixed  $job
     * @param  callable  $next
     * @return mixed
     */
    public function handle($job, $next)
    {
        Redis::throttle('key')->allow(1)->every(2)->then(function () use ($job, $next) {
                $next($job);
            }, function () use ($job) {
                $job->release(5);
            });


    }
}