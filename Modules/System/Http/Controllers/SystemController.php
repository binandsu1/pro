<?php

namespace Modules\System\Http\Controllers;

use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;
use Modules\Curd\Models\XdoLog;

class SystemController extends AdminController
{
    /**
     * @name 管理员列表
     * @is_menu 1
     */
    public function admin()
    {
        return view('system::index');
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
}
