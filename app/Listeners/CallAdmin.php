<?php

namespace App\Listeners;

use App\Events\AddUserEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Modules\Curd\Models\XdoLog;

class CallAdmin implements ShouldQueue
{
    #加入这个监听器入队列了就 接口一下上面的就接进来了
    public $connection = 'rabbitmq';
    public $queue = 'EventJob1';
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  AddUserEvent  $event
     * @return void
     */
    public function handle(AddUserEvent $event)
    {
        $return = $event->user;
        $data["user_id"] = $return->id;
        $data["user_name"] = $return->name."默认监听";
        $data["admin_name"] = $return->admin."默认监听";
        XdoLog::create($data);
    }
}
