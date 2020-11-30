<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    protected $auth;

    function __construct()
    {
        $this->auth = auth('web');
        #所有视图共享
        \View::share('auth', $this->auth);
        #except 排除这些路由其他的走验证 黑名单 还有一个白名单
        $this->middleware('auth')->except(['login', 'logout', 'test']);
//        $this->middleware('show-sql')->except(['login', 'logout', 'test']);
        $this->auth = auth('web');
    }

    public static function returnSuccess($data = [])
    {
        $errorCode = config('errorcode');
        if (request()->ajax()) {
            return ['status' => $errorCode['AJAXCODE']['ERR_OK']['code'], 'msg' => $errorCode['AJAXCODE']['ERR_OK']['msg'], 'data' => $data];
        } else {
            return view(static::$SUCCESS_VIEW, compact('data'));
        }
    }

    public static function returnError($msg = '', $status = 0, $data = [])
    {
        $errorCode = config('errorcode');
        if (request()->ajax()) {
            $status = $status ? $status : $errorCode['AJAXCODE']['ERR_PUBLIC']['code'];
            $msg = $msg ? $msg : $errorCode['AJAXCODE']['ERR_PUBLIC']['msg'];
            return compact('status', 'msg', 'data');
        } else {
            return view(static::$ERROR_VIEW, compact('msg', 'status', 'data'));
        }
    }

    public function getParas($request, $data)
    {
        if (!empty($data)) {
            foreach ($request->all() as $k => $v) {
                if ($k != '_token') {
                    $data->$k = $v;
                }
            }
            return $data;
        } else {
            $data = $request->all();
            unset($data['id']);
            unset($data['_token']);
            return $data;
        }

    }

    public function getParasSel($data)
    {
        $wheres = [];
        foreach ($data as $k => $v) {
            if (!empty($v)) {
                $arr_v = explode('-', $k);
                if (!empty($arr_v[0]) && !empty($arr_v[1])) {
                    $wheres[] =  [$arr_v[0],$arr_v[1],"%".$v."%"];
                }
            }
        }
        return $wheres;
    }

    public function getSelect($arr_v, $query, $v)
    {
        if ($arr_v[1] == 'like') {
            return $query->where($arr_v[0], 'like', '%' . $v . '%');
        }
        return $query;
    }

    public function containsOnlyNull($input)
    {
        return empty(array_filter($input, function ($a) {
            return $a !== null;
        }));
    }

}
