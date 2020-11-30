<?php

namespace Modules\Laravel\Http\Controllers;

use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;
use Modules\Laravel\Http\Middleware\FunctionsMidd;
use Modules\Laravel\Http\Middleware\QuestionMidd;
use Modules\Laravel\Models\XdoArtisan;

class FunctionController extends AdminController
{

    /**
     * @name 函数汇总
     * @is_menu 1
     */
    public function functions(Request $request)
    {
        $query = XdoArtisan::where("type",'like','%functions%')->orderBy('id','desc');
        $where = $this->getParasSel($request->all());
        $list = $query->where($where)->paginate(10)->appends($request->all());
        return view('laravel::admin.functions',compact('list'));
    }

    public function functionsAdd(Request $request)
    {
        $id = $request->input('id');
        $data = XdoArtisan::find($id);
        if($request->method() == 'GET'){
            return view('laravel::admin.functions-add',compact('data'));
        }
        app()->make(FunctionsMidd::class);
        $data = $this->getParas($request,$data);
        $add_re = $id ? $data->save() : XdoArtisan::create($data);
        if($add_re){
            return $this->returnSuccess();
        }
        return $this->returnError("函数保存失败");
    }

    public function functionsSel(Request $request)
    {
        $id = $request->input('id');
        $data = XdoArtisan::find($id);
        if($request->method() == 'GET'){
            return view('laravel::admin.functions-sel',compact('data'));
        }
    }

    #https://blog.csdn.net/lixing1359199697/article/details/81202268 软删除文档查看
    public function functionsDel(Request $request)
    {
        $id = $request->input('id');
        $del_re = XdoArtisan::find($id)->delete();
        if($del_re){
            return $this->returnSuccess();
        }
    }


}
