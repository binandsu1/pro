<?php

namespace Modules\System\Http\Controllers;

use App\Http\Controllers\AdminController;
use App\Models\User;
use Illuminate\Http\Request;
use Modules\Curd\Models\XdoLog;

class SystemController extends AdminController
{
    /**
     * @name 管理员列表
     * @is_menu 1
     */
    public function admin(Request $request)
    {
        $query = User::orderBy('id','asc');
        $where = $this->getParasSel($request->all());
        $list = $query->where($where)->paginate(10)->appends($request->all());
        return view('system::admin',compact('list'));
    }

    /**
     * @name 角色列表
     * @is_menu 1
     */
    public function role()
    {
        return view('system::index');
    }

    /**
     * @name 权限分配
     * @is_menu 1
     */
    public function roleSet(Request $request)
    {
        return view('system::index');
    }

    /**
     * @name 操作日志
     * @is_menu 1
     */
    public function log(Request $request)
    {
        $query = XdoLog::orderBy('id','desc');
        $where = $this->getParasSel($request->all());
        $list = $query->where($where)->paginate(10)->appends($request->all());
        return view('system::log',compact('list'));
    }

    public function logSel(Request $request){
        $id = $request->input('id');
        $list = XdoLog::find($id);
        return view('system::log-sel',compact('list'));
    }
    public function prohibit(Request $request){
        $id = $request->input('id');
        $status = $request->input('status');
        $user = User::find($id);
        $user->status = $status;
        $user->save();
        return static::returnSuccess();

    }
}
