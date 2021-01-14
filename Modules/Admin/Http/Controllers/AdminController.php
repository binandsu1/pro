<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Artisan;
use Modules\Curd\Models\XdoLog;
use Modules\Laravel\Models\XdoArtisan;
use Modules\Laravel\Models\XdoEnv;
use PasswordValidationRules;

//class AdminController extends Controller
class AdminController extends \App\Http\Controllers\AdminController
{

    protected $redirectTo = '/admin';

    public function login(Request $request)
    {
        if ($request->method() == 'POST') {
            #显示一个基本的验证
            $this->validateLogin($request);
            if ($this->attemptLogin($request)) {
                $login_result = $this->sendLoginResponse($request);
                return  $login_result;
            }
            return $this->sendFailedLoginResponse($request);
        }
        return view('admin::login');
    }

    protected function validateLogin(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:10',
            'password' => 'required|string|min:3|max:10',
        ], [
            'name.required' => '请输入用户名',
            'name.min' => '用户名最少3字符',
            'name.max' => '用户名最多10字符',
            'password.required' => '请输入密码',
            'password.confirmed' => '两次密码输入不一致',
            'password.min' => '密码最少3字符',
            'password.max' => '密码最多20字符',
        ]);
    }

    protected function attemptLogin(Request $request)
    {
        $data = $request->only('name', 'password');
        $data['status'] = 1;
        // 验证登录的逻辑
         $login_status = $this->auth->attempt(
            $data,
            $request->filled('remember')
        );
         #request name password 尝试登陆用户名密码
        #记录进log表
        $json_data["login_status"] = $login_status;
        $json_data["admin_name"] = $request->name;
        $json_data["password"] = $request->password;
        $log_data["t_id"] = 0;
        $log_data["act"] = "login";
        $log_data["admin_id"] = 0;
        $log_data["table"] = "***";
        $log_data["admin_name"] = $request->name;
        $log_data["data"] = json_encode($json_data);
        $log_data["ip"] = $request->getClientIp();
        XdoLog::create($log_data);
        return $request;
    }

    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();
        return $this->authenticated($request, $this->auth->user())
            ?: redirect()->intended($this->redirectPath());
    }

    protected function authenticated(Request $request, $user)
    {
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            'username' => [trans('auth.failed')],
        ]);
    }

    public function redirectPath()
    {
        if (method_exists($this, 'redirectTo')) {
            return $this->redirectTo();
        }
        $result = property_exists($this, 'redirectTo') ? $this->redirectTo : '/home';
        return $result;
    }


    public function searchGlobal(Request $request)
    {
        $value = $request->input('_value');
        $query = XdoArtisan::where('title', 'like', "%" . $value . "%")->orwhere('name', 'like', "%" . $value . "%")->orwhere('desc', 'like', "%" . $value . "%")->orderBy('id', 'desc');
        $list = $query->paginate(100)->appends($request->all());
        return view('gs', compact('list'));
    }

    public function index()
    {
        $data = XdoEnv::where("name", 'debug')->first();
        return view('admin::index', compact('data'));
    }

    protected function logOut(Request $request)
    {
        $auth = auth('web')->user();
        #记录进log表
        $log_data["t_id"] = 0;
        $log_data["act"] = "logout";
        $log_data["admin_id"] = $auth->id;
        $log_data["table"] = "***";
        $log_data["admin_name"] = $auth->name;
        $log_data["ip"] = $request->getClientIp();
        XdoLog::create($log_data);
        $this->guard()->logoutCurrentDevice();
        $request->session()->flush();
        return redirect(route('admin.login'));
    }

    protected function guard()
    {
        return $this->auth;
    }


    public function menu()
    {
        Artisan::call('yan:action');
        return redirect(route('admin'));
    }

    public function debugStatus(Request $request)
    {
        $status = $request->input('status');
        $xdo_env = XdoEnv::where("name", 'debug')->first();
        $xdo_env->status = $status;
        $xdo_env->save();
        return redirect(route('admin'));
    }

    public function register(Request $request)
    {

        if ($request->method() == 'GET') {
            return view('admin::register');
        }

        if ($request->method() == 'POST') {
            $request->validate([
                'name' => 'required|string|min:3|max:10',
                'password' => 'required|string|min:3|max:10',
            ], [
                'name.required' => '请输入用户名',
                'name.min' => '用户名最少3字符',
                'name.max' => '用户名最多10字符',
                'password.required' => '请输入密码',
                'password.confirmed' => '两次密码输入不一致',
                'password.min' => '密码最少3字符',
                'password.max' => '密码最多20字符',
            ]);

            $user = User::create([
                'name' => $request->input('name'),
                'password' => Hash::make($request->input('password')),
            ]);
            $this->guard()->login($user);
            return redirect(route('admin'));
        }
    }


}
