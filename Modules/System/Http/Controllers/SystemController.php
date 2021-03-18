<?php

namespace Modules\System\Http\Controllers;

use App\Http\Controllers\AdminController;
use App\Models\User;
use Illuminate\Http\Request;
use Modules\Curd\Models\XdoLog;
use Modules\System\Http\Middleware\RoleAddMidd;
use Modules\System\Models\XdoRole;

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
        $query = XdoRole::orderBy('id','DESC');
        $list = $query->paginate(10);
        return view('system::role',compact('list'));
    }

    /**
     * @name 添加角色
     */
    public function roleAdd(Request $request)
    {
        $id = $request->input('id');
        $name = $request->input('name');
        $data = XdoRole::find($id);
        if($request->method() == 'POST'){
            app()->make(RoleAddMidd::class);
            $data['role_name'] = $name;
            $add_re = $id ? $data->save() : XdoRole::create($data);
            if($add_re){
                return $this->returnSuccess();
            }
        }
        return view('system::role-add',compact('data'));

    }

    public function roleDel(Request $request){
        $id = $request->input('id');
        $del_re = XdoRole::find($id)->delete();
        if($del_re){
            return $this->returnSuccess();
        }
    }

    public function roleUpStatus(Request $request){
        $id = $request->input('id');
        $status = $request->input('status');
        $role = XdoRole::find($id);
        $role->status = $status;
        $up_re = $role->save();
        if($up_re){
            return $this->returnSuccess();
        }
    }

    /**
     * @name 权限分配
     * @is_menu 1
     */
    public function roleSet(Request $request)
    {
        return view('system::role-set');
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
