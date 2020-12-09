<?php

namespace App\Providers;

use App\Events\AddUserEvent;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use Modules\Curd\Models\XdoLog;
use function Illuminate\Events\queueable;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        'App\Events\UserEvent' => [
            'App\Listeners\UserListen',
        ],
        'App\Events\AddUserEvent' => [ #添加用户后
            'App\Listeners\CallAdmin', #通知管理员
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        #自定义监听
        Event::listen(function (AddUserEvent $event) {
            $return = $event->user;
            $data["user_id"] = $return->id;
            $data["user_name"] = $return->name."手动监听";
            $data["admin_name"] = $return->admin."手动监听";
            XdoLog::create($data);
        });
        #队列监听
        Event::listen(queueable(function (AddUserEvent $event) {
            $return = $event->user;
            $data["user_id"] = $return->id;
            $data["user_name"] = $return->name."队列监听";
            $data["admin_name"] = $return->admin."队列监听";
            XdoLog::create($data);
        })->onConnection('rabbitmq')->onQueue('EventJob'));

    }
}
