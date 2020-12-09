<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class Hello implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

//    protected $str = '';
    protected $usermodel;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->connection = 'rabbitmq';
        $this->queue = 'Hello';
//        $this->str = $str;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(User $usermodel)
    {
        echo 'hello dj';
        $list = $usermodel->get()->toArray();

    }
}
