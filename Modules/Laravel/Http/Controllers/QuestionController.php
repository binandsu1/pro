<?php

namespace Modules\Laravel\Http\Controllers;

use App\Http\Controllers\AdminController;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Modules\Laravel\Http\Middleware\ArtisanMidd;
use Modules\Laravel\Http\Middleware\QuestionMidd;
use Modules\Laravel\Models\XdoArtisan;

class QuestionController extends AdminController
{

    /**
     * @name 问题汇总
     * @is_menu 1
     */
    public function question(Request $request)
    {
        $query = XdoArtisan::where("type",'question')->orderBy('id','desc');
        $where = $this->getParasSel($request->all());
        $list = $query->where($where)->paginate(10)->appends($request->all());
        return view('laravel::admin.question',compact('list'));
    }

    public function questionAdd(Request $request)
    {
        $id = $request->input('id');
        $data = XdoArtisan::find($id);
        if($request->method() == 'GET'){
            return view('laravel::admin.question-add',compact('data'));
        }
        app()->make(QuestionMidd::class);
        $data = $this->getParas($request,$data);
        $add_re = $id ? $data->save() : XdoArtisan::create($data);
        if($add_re){
            return $this->returnSuccess();
        }
        return $this->returnError("脚本保存失败");
    }

    public function questionSel(Request $request)
    {
        $id = $request->input('id');
        $data = XdoArtisan::find($id);
        if($request->method() == 'GET'){
            return view('laravel::admin.question-sel',compact('data'));
        }
    }

    #https://blog.csdn.net/lixing1359199697/article/details/81202268 软删除文档查看
    public function questionDel(Request $request)
    {
        $id = $request->input('id');
        $del_re = XdoArtisan::find($id)->delete();
        if($del_re){
            return $this->returnSuccess();
        }
    }


}
