<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Modules\Auth\Models\LvAdminUser;
use Modules\Curd\Models\XdoLog;
use Modules\System\Models\XdoAdminOptionLog;
use Modules\System\Models\XdoOptionLog;
use Nexmo\Client\Exception\Exception;

class logOption implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $tries = 3;
    public $timeout = 10;
    protected $data;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->connection = 'rabbitmq';
        $this->queue = 'logOptionJob';
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        XdoLog::create($this->data);
    }
}
