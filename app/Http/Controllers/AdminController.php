<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class AdminController extends Controller
{
    protected $auth;
    protected static $SUCCESS_VIEW = 'public.success';
    protected static $ERROR_VIEW = 'public.error';

    function __construct()
    {

        //redis令牌桶算法 限流
        # $this->redisLimit();
        //redis漏桶算法 限流
        $this->LeackBucket();


        $this->auth = auth('web');
        #所有视图共享
        \View::share('auth', $this->auth);
        #except 排除这些路由其他的走验证 黑名单 还有一个白名单
        $this->middleware('auth')->except(['login', 'logout', 'test','register']);
//        $this->middleware('show-sql')->except(['login', 'logout', 'test']);
        $this->auth = auth('web');
    }



    public static function returnSuccess($data = []){
        $errorCode = config('errorcode');
        if(request()->ajax()){
            return ['status'=>$errorCode['AJAXCODE']['ERR_OK']['code'],'msg'=>$errorCode['AJAXCODE']['ERR_OK']['msg'],'data'=>$data];
        }else{
            return view(static::$SUCCESS_VIEW,compact('data'));
        }
    }

//    public static function returnError($msg = '',$status = 0,$data = []){
//        $errorCode = config('errorcode');
//        if(request()->ajax()){
//            $status = $status?$status:$errorCode['AJAXCODE']['ERR_PUBLIC']['code'];
//            $msg = $msg?$msg:$errorCode['AJAXCODE']['ERR_PUBLIC']['msg'];
//            return compact('status','msg','data');
//        }else{
//            return view(static::$ERROR_VIEW,compact('msg','status','data'));
//        }
//    }

    public static function returnError(){
        $arr["status"] = 1;
        $arr["msg"] = 1;

            return $arr;
    }


    public function getParas($request, $data)
    {
        if (!empty($data)) {
            foreach ($request->all() as $k => $v) {
                if ($k != '_token') {
                    $data->$k = $v;
                }
            }
            return $data;
        } else {
            $data = $request->all();
            unset($data['id']);
            unset($data['_token']);
            return $data;
        }

    }

    public function getParasSel($data)
    {
        $wheres = [];
        foreach ($data as $k => $v) {
            if (!empty($v)) {
                $arr_v = explode('-', $k);
                if (!empty($arr_v[0]) && !empty($arr_v[1])) {
                    $wheres[] =  [$arr_v[0],$arr_v[1],"%".$v."%"];
                }
            }
        }
        return $wheres;
    }

    public function getSelect($arr_v, $query, $v)
    {
        if ($arr_v[1] == 'like') {
            return $query->where($arr_v[0], 'like', '%' . $v . '%');
        }
        return $query;
    }

    public function containsOnlyNull($input)
    {
        return empty(array_filter($input, function ($a) {
            return $a !== null;
        }));
    }

    //漏桶算法
    function LeackBucket() {

        $redis = new Redis();

        //时间 s
        $interval = 60;
        //每分钟流出的数量
        $speed   = 60;
        //用户
        $time = $redis::time();
        $key = $time[0].$time[1];

        //时间判断
        //$redis->del('outCount');
        $check = $redis::exists('outCount');
        // echo $check;
        if ($check){
            //出桶的速率的请求数量
            $outCount = $redis::incr('outCount');
            if ($outCount<=$speed){
//                echo $outCount;
//                echo "规定的每分钟只能访问10次当前访问第 $outCount 次";die;
            } else {
                echo "高峰流量控制 漏桶算法和令牌桶算法<br>";
                echo "漏桶算法 ";
                echo "强行限制数据的平均传输速率<br>";
                echo "令牌桶算法 除了能限制平均传输速率 新增一个保护机制 还允许某种程度的突发传输<br>";
                echo "漏桶的话 下游只能按漏水速度取请求 在令牌桶算法里 下游可以一次过取很多请求<br>";
                echo "你已经超过每分钟的访问30次 现在都访问 $outCount 次了  禁止访问了bro";die;
            }
        } else {
            #自增+1
            $redis::set('outCount',1);
            #设置redis过期时间
            $redis::Expire('outCount',$interval);
        }
    }

    public function redisLimit(){
        $redisLS = app('xdo.redis-limit');
//        $redisLS->add(20);
        //初始化
//        $redisLS->reset();
//        $redisLS->add(20);die;
         if(!$redisLS->get()){
             $redisLS->add(20);
             echo '禁止访问了 加令牌吧';die;
         }else{
             // echo 'go on';
         }
    }

}
