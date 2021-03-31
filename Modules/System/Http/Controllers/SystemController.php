<?php

namespace Modules\System\Http\Controllers;

use App\Http\Controllers\AdminController;
use App\Models\User;
use Illuminate\Http\Request;
use Modules\Auth\Models\XdoAdminGroup;
use Modules\Curd\Models\XdoLog;
use Modules\System\Http\Middleware\RoleAddMidd;
use Modules\System\Models\XdoAction;
use Modules\System\Models\XdoAdminGroupAction;
use Modules\System\Models\XdoMoney;
use Modules\System\Models\XdoRole;

class SystemController extends AdminController
{
    /**
     * @name 管理员列表
     * @is_menu 1
     */
    public function admin(Request $request)
    {
        $query = User::orderBy('id', 'asc');
        $where = $this->getParasSel($request->all());
        $list = $query->where($where)->paginate(10)->appends($request->all());
        return view('system::admin', compact('list'));
    }

    public function adminAddRole(Request $request)
    {
        $admin_id = $request->input('admin_id');
        $role_id = $request->input('role_id');
        $adminObj = User::find($admin_id);
        $adminObj->role_ids = $role_id;
        $adminObj->save();
        return true;
    }

    public function roleLaod(Request $request){

        $admin_id = $request->input('admin_id');
        $role_list = XdoRole::where('status',1)->get()->toArray();
        $admin_info = User::find($admin_id)->toArray();
        $admin_ids = $admin_info['role_ids'];
        $admin_id_arr = explode(',',$admin_ids);
        $json_role = [];
        foreach ($role_list as $k=>$v){
            $json_role[$k]["value"] = $v["id"];
            $json_role[$k]["title"] = $v["role_name"];
//            $json_role[$k]["disabled"] = 'true';
        }
        $data['data1'] = $json_role;
        $data['data2'] = $admin_id_arr;
        return $data;
    }

    /**
     * @name 角色列表
     * @is_menu 1
     */
    public function role()
    {
        $query = XdoRole::orderBy('id', 'DESC');
        $list = $query->paginate(10);
        return view('system::role', compact('list'));
    }

    /**
     * @name 添加角色
     */
    public function roleAdd(Request $request)
    {
        $id = $request->input('id');
        $name = $request->input('name');
        $data = XdoRole::find($id);
        if ($request->method() == 'POST') {
            app()->make(RoleAddMidd::class);
            $data['role_name'] = $name;
            $add_re = $id ? $data->save() : XdoRole::create($data);
            if ($add_re) {
                return $this->returnSuccess();
            }
        }
        return view('system::role-add', compact('data'));

    }

    public function roleDel(Request $request)
    {
        $id = $request->input('id');
        $del_re = XdoRole::find($id)->delete();
        if ($del_re) {
            return $this->returnSuccess();
        }
    }

    public function roleChange(Request $request)
    {
        $id = $request->input('id');
        $admin_id = $request->input('admin_id');
        $admin_info = User::find($admin_id);
        $admin_info->curr_role_id = $id;
        if ($admin_info->save()) {
            return redirect()->route('admin');
        }
    }

    public function roleUpStatus(Request $request)
    {
        $id = $request->input('id');
        $status = $request->input('status');
        $role = XdoRole::find($id);
        $role->status = $status;
        $up_re = $role->save();
        if ($up_re) {
            return $this->returnSuccess();
        }
    }

    public function roleSave(Request $request)
    {
        $do = $request->input('do', 'add');
        if (!in_array($do, ['add', 'del'])) {
            return abort(404);
        }
        $roleId = $request->input('role_id');
        $actionUnioncode = $request->input('action_unioncode');
        $XdoAuth = app('xdo.action');
        $XdoAuth->setRoleAction($roleId, $actionUnioncode, $do);
        return $this->returnSuccess();

    }

    /**
     * @name 权限分配
     * @is_menu 1
     */
    public function roleSet(Request $request)
    {
        $role_list = XdoRole::get();
        $sys_action = app('xdo.action');
        $modules = $sys_action->getAdminActions();

        $id = $request->input('id');
        $query = XdoRole::where('status', 1);
        if ($id) {
            $currRole = $query->where('id', $id)->first();
            if (!$currRole) {
                return abort(404);
            }
        } else {
            $currRole = $query->first();
        }
        // 获取当前角色权限分配
        $hasActions = XdoAdminGroupAction::where('group_id', $id)->where('is_del', 0)->pluck('unioncode')->toArray();
        return view('system::role-set', compact('role_list', 'modules', 'hasActions'));
    }


    public function roleSel(Request $request)
    {
        $id = $request->input('id');
        $role_info = XdoAction::find($id);
        return view('system::role-sel', compact('role_info'));
    }

    /**
     * @name 操作日志
     * @is_menu 1
     */
    public function log(Request $request)
    {
        $query = XdoLog::orderBy('id', 'desc');
        $where = $this->getParasSel($request->all());
        $list = $query->where($where)->paginate(10)->appends($request->all());
        return view('system::log', compact('list'));
    }

    public function logSel(Request $request)
    {
        $id = $request->input('id');
        $list = XdoLog::find($id);
        return view('system::log-sel', compact('list'));
    }

    public function prohibit(Request $request)
    {
        $id = $request->input('id');
        $status = $request->input('status');
        $user = User::find($id);
        $user->status = $status;
        $user->save();
        return static::returnSuccess();

    }

    public function money(Request $request){

        $query = XdoMoney::orderBy('id', 'asc');
        $where = $this->getParasSel($request->all());
        $list = $query->paginate(5)->appends($request->all());

        return $list;
    }
}
