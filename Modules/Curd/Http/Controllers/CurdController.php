<?php

namespace Modules\Curd\Http\Controllers;

use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;
use Modules\Curd\Http\Middleware\XdoDataMidd;
use Modules\Curd\Models\XdoData;

class CurdController extends AdminController
{
    /**
     * @name 数据列表-横
     * @is_menu 1
     */
    //* ./artisan vendor:publish --tag=laravel-pagination  分页
    //* Paginator::useBootstrap();
    //* use Illuminate\Pagination\Paginator;
    public function demo1(Request $request)
    {
        $query = XdoData::orderBy('id','desc');
        $where = $this->getParasSel($request->all());
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
     * @name 按钮样式
     * @is_menu 1
     */
    public function button(Request $request)
    {

        return view('curd::admin.button');
    }

    public function demoAdd(Request $request){
        $id = $request->input('id');
        $data = XdoData::find($id);
        if($request->method() == 'GET'){
            return view('curd::admin.demo-add',compact('data'));
        }
        app()->make(XdoDataMidd::class);
        $data = $this->getParas($request,$data);
        $add_re = $id ? $data->save() : XdoData::create($data);
        if($add_re){
            return $this->returnSuccess();
        }
        return $this->returnError("学生保存失败");

    }

    public function demoDel(Request $request){
        $id = $request->input('id');
        $del_re = XdoData::find($id)->delete();
        if($del_re){
            return $this->returnSuccess();
        }
    }

    public function demoSel(Request $request)
    {
        $id = $request->input('id');
        $data = XdoData::find($id);
        if($request->method() == 'GET'){
            return view('curd::admin.demo-sel',compact('data'));
        }
    }
}
