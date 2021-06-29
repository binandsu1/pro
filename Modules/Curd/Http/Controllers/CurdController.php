<?php

namespace Modules\Curd\Http\Controllers;

use App\Events\AddUserEvent;
use App\Exports\CurdExport;
use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Curd\Http\Middleware\XdoDataMidd;
use Modules\Curd\Models\XdoData;
use Modules\Outbound\Exports\RecordLogExports;

class CurdController extends AdminController
{

    /**
     * @name 数据列表-横
     * @is_menu 1
     */
    //* ./artisan vendor:publish --tag=laravel-pagination  分页
    //* Paginator::useBootstrap();1ss
    //* use Illuminate\Pagination\Paginator;
    public function demo1(Request $request)
    {
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
}
