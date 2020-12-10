<?php

namespace App\Providers;

use App\Observers\LogObserver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Redis;
use Modules\Curd\Models\XdoData;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

        Schema::defaultStringLength(191);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->addModelLog();
        $this->listendb();
    }

    public function addModelLog(){
        #直接所有的都在这里引入
        XdoData::observe(LogObserver::class);
    }

    public function listendb(){
        DB::listen(
            function($query) {
                $request = request();
//            $logSql = $request->has('_sql');
//            if ( !$logSql) return;
                $logs = [];
                $sqlLog = [
                    'sql'         => vsprintf(str_replace("?", "'%s'", $query->sql), $query->bindings),
                    'time'        => $query->time,
                    'path'        => $request->path(),
                    'url'         =>  $request->url(),
//                    'fingerprint' => $request->fingerprint()
                ];
                #排除一些系统的sql不记录
                if(substr_count($sqlLog['sql'],'sessions') || substr_count($sqlLog['sql'],'xdo_envs') || substr_count($sqlLog['sql'],'debug') || substr_count($sqlLog['sql'],'route') || substr_count($sqlLog['sql'],'count(*)')){
                    $sqlLog = [];
                }
//            unset($sqlLog['fingerprint']);
                if(!empty($sqlLog["sql"])){
                    $logs[] = $sqlLog;
                }
                $logs = Cache::pull('logs', []);
                if(!empty($sqlLog)){
                    $logs[] = $sqlLog;
                }
                $logs = uniquArr($logs,'sql');
                Cache::put('logs', $logs);
            });
    }

}
