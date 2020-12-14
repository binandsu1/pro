<?php

namespace Modules\Laravel\Http\Controllers;

use App\Http\Controllers\AdminController;
use App\Jobs\Hello;
use App\Jobs\Middleware\RateLimited;
use App\Jobs\UserJob;
use App\Jobs\UserJob1;
use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\DB;
use Modules\Laravel\Http\Middleware\ArtisanMidd;
use Modules\Laravel\Models\XdoArtisan;
use Modules\Laravel\Models\XdoJobData;

class LaravelController extends AdminController
{
    /**
     * @name 请求生命周期
     * @is_menu 1
     */
    public function index()
    {
        return view('laravel::admin.index');
    }

    /**
     * @name 脚本命令
     * @is_menu 1
     */
    #https://www.jb51.net/article/191741.htm
    # toRawSql  dumpSql  ddSql
    public function artisan(Request $request)
    {
        $query = XdoArtisan::where("type",'artisan')->orderBy('id','desc');
        $where = $this->getParasSel($request->all());
        $list = $query->where($where)->paginate(10)->appends($request->all());
        return view('laravel::admin.artisan',compact('list'));
    }

    /**
     * @name 脚本介绍
     * @is_menu 1
     */
    public function artisanInfo()
    {
        return view('laravel::admin.artisan-info');
    }

    public function artisanAdd(Request $request)
    {
        $id = $request->input('id');
        $data = XdoArtisan::find($id);
        if($request->method() == 'GET'){
            return view('laravel::admin.artisan-add',compact('data'));
        }
        app()->make(ArtisanMidd::class);
        $data = $this->getParas($request,$data);
        $add_re = $id ? $data->save() : XdoArtisan::create($data);
        if($add_re){
            return $this->returnSuccess();
        }
        return $this->returnError("脚本保存失败");
    }

    public function artisanSel(Request $request)
    {
        $id = $request->input('id');
        $data = XdoArtisan::find($id);
        if($request->method() == 'GET'){
            return view('laravel::admin.artisan-sel',compact('data'));
        }
    }


    #https://blog.csdn.net/lixing1359199697/article/details/81202268 软删除文档查看
    public function artisanDel(Request $request)
    {
        $id = $request->input('id');
        $del_re = XdoArtisan::find($id)->delete();
        if($del_re){
            return $this->returnSuccess();
        }
    }

    /**
     * @name 用户认证
     * @is_menu 1
     */
    public function user()
    {
        return view('laravel::admin.user-info');
    }

    /**
     * @name 队列
     * @is_menu 1
     */
    public function queue(Request $request)
    {
        $num = $request->input('num');
        if($num > 0){

//            UserJob::dispatch('z');die;
//            Hello::dispatch();die;
            for($i=1;$i<=1000;$i++){
                #路由中间件
//                UserJob::dispatch($i)->through([new RateLimited()]);
                UserJob::dispatch($i);
//                UserJob::dispatchNow($i);;
                #有问题明天查看 队列连
//                Bus::chain([
//                    UserJob::dispatch($i),
//                    UserJob1::dispatch($i),
//                ]);
//                UserJob::dispatchAfterResponse($i);
            }
            return redirect(route('admin.laravel.queue'));
        }
        $query = XdoJobData::orderBy('id','desc');
        $list = $query->paginate(10)->appends($request->all());
        $total_arr = [];
        $total_arr["success"] = XdoJobData::where("is_over",1)->count();
        $total_arr["error"] = XdoJobData::where("is_over",0)->count();
        return view('laravel::admin.queue-info',compact('list','total_arr'));
    }

    /**
     * @name 事件监听
     * @is_menu 1
     */
    public function listen()
    {
        return view('laravel::admin.listen-info');
    }

}
