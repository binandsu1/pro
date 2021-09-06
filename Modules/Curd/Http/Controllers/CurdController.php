<?php

namespace Modules\Curd\Http\Controllers;

use App\Events\AddUserEvent;
use App\Exports\CurdExport;
use App\Http\Controllers\AdminController;
use App\Http\Traits\ta;
use Basemkhirat\Elasticsearch\Facades\ES;
use Elasticsearch\ClientBuilder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Curd\Http\Middleware\XdoDataMidd;
use Modules\Curd\Models\XdoData;
use Modules\Outbound\Exports\RecordLogExports;
use Illuminate\Support\Facades\Cache;
class CurdController extends AdminController
{
    public $data;
    /**
     * @name 数据列表-横
     * @is_menu 1
     */
    //* ./artisan vendor:publish --tag=laravel-pagination  分页
    //* Paginator::useBootstrap();1ss
    //* use Illuminate\Pagination\Paginator;
    public function demo1(Request $request)
    {

        //获取当前环境 .env里面有个APP_ENV
//        $a = App::environment();
//        $a = config('app.timezone');
//        dd($a);
        //echo $this->getta();die;
        //echo $this->getinfo();die;
//        XdoData::insert([
//            'name' => Crypt::encryptString('123456')
//        ]);
//laravel 加密 解密  artisan key:  encryptString  decryptString
//        $a = "eyJpdiI6Ik1UOTVrUGdJWWpUNktISmF3M2Z0RkE9PSIsInZhbHVlIjoiOWFBeWlPSHBuWWNtbHAwcmxqRlBPZz09IiwibWFjIjoiZTY2NzkyYjZhNjI1OTAwMDI0YjMwMjAwODc2Yjg0ZmFlZjYxNzc2YWU4OTYzNDU5NGJiMjliNWVhZjliMjE1ZSJ9";
//        $b = Crypt::decryptString($a);
//         echo $b;
//        die;
        $query = XdoData::orderBy('id','desc');
        $excel = $request->input('excel');
        $where = $this->getParasSel($request->all());
        if($excel){
            $data = $query->where($where)->get();
            $exports = new CurdExport($data);
            $title = sprintf('数据导出'.date('Y-m-d-H-i-s').'.xlsx');
            return Excel::download($exports, $title);
        }
        $list = $query->where($where)->paginate(10)->appends($request->all());
        return view('curd::admin.demo1',compact('list'));
    }

    /**
     * @name 数据列表-竖
     * @is_menu 1
     */
    public function demo2(Request $request)
    {
        $query = XdoData::orderBy('id','desc');
        $where = $this->getParasSel($request->all());
        $list = $query->where($where)->paginate(10)->appends($request->all());
        return view('curd::admin.demo2',compact('list'));
    }

    /**
     * @name peace
     * @is_menu 0
     */
    public function button(Request $request)
    {
        return view('curd::admin.button');
    }
    /**
     * @name 数据添加
     * @is_menu 0
     */
    public function demoAdd(Request $request){
        $id = $request->input('id');
        $data = XdoData::find($id);
        if($request->method() == 'GET'){
            return view('curd::admin.demo-add',compact('data'));
        }
        app()->make(XdoDataMidd::class);
        $data = $this->getParas($request,$data);
        $add_re = $id ? $data->save() : XdoData::create($data);
        #保存之后 传入一个事件
//        event(new AddUserEvent($add_re));
        if($add_re){
            return $this->returnSuccess();
        }
        return $this->returnError("学生保存失败");

    }
    /**
     * @name 数据删除
     * @is_menu 0
     */
    public function demoDel(Request $request){
        $id = $request->input('id');
        $del_re = XdoData::find($id)->delete();
        if($del_re){
            return $this->returnSuccess();
        }
    }
    /**
     * @name 数据查看
     * @is_menu 0
     */
    public function demoSel(Request $request)
    {
        $id = $request->input('id');
        $data = XdoData::find($id);
        if($request->method() == 'GET'){
            return view('curd::admin.demo-sel',compact('data'));
        }
    }


    public function sw(){

        $fd =1;// Find fd by userId from a map [userId=>fd].
        /**@var \Swoole\WebSocket\Server $swoole
        $swoole = app('swoole');
        $success = $swoole->push($fd,'Push data to fd#1 in Controller');
        var_dump($success);*/
        return view('curd::admin.demo-sw');


    }
    //Laravel 服务容器是一个用于管理类依赖和执行依赖注入的强大工具
    public function __construct(XdoData $data)
    {
            $this->data = $data;
    }

    //new 和 make的区别 new的时候是直接实例化 make的是 直接用服务提供者已经绑定好的容器
    //依赖注入是在方法的时候 直接饮用 app()->make == app
    public function rq(car $ad){
//
//          $service = app()->make(dz::class);
//          $service =new dz();
//          $service = app(car::class);
//        $service = new bmw();
//         $a = $service->name();

//         $a = app('xoddatamodel');
//         dd($a->find(1));
        $ad = app()->make(car::class);
        dd($ad->name());



//        $s = app('asd');
//        dd($s->find(1));
        echo '容器';die;
    }
}
