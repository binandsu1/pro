<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Artisan;
use Laravel\Fortify\Contracts\LoginResponse;
use Modules\Laravel\Models\XdoArtisan;
use Modules\Laravel\Models\XdoEnv;

//class AdminController extends Controller
class AdminController extends \App\Http\Controllers\AdminController
{
    protected $redirectTo = '/admin';
    public function login(Request $request)
    {
        if($request->method() == 'POST'){
            #显示一个基本的验证
            $this->validateLogin($request);
            if ($this->attemptLogin($request)) {
                return $this->sendLoginResponse($request);
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
        ],[
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
//        $data['status'] = 0;
//        $data['hr_status'] = 'A';
        // 验证登录的逻辑
        $result = $this->auth->attempt(
            $data,
            $request->filled('remember')
        );
//        dd($result);
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
        //
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
        $result =  property_exists($this, 'redirectTo') ? $this->redirectTo : '/home';
        return $result;
    }


    public function searchGlobal(Request $request){

        $value = $request->input('_value');
        $query = XdoArtisan::where('title','like',"%".$value."%")->orwhere('name','like',"%".$value."%")->orwhere('desc','like',"%".$value."%")->orderBy('id','desc');
        $list = $query->paginate(100)->appends($request->all());
        return view('gs',compact('list'));
    }



    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $data = XdoEnv::where("name",'debug')->first();
        return view('admin::index',compact('data'));
    }
    protected function logOut(Request $request){

        $this->guard()->logoutCurrentDevice();

        $request->session()->flush();

        return redirect(route('admin.login'));
    }

    protected function guard()
    {
        return $this->auth;
    }


    public function menu(){
        Artisan::call('yan:action');
        return redirect(route('admin'));
    }

    public function debugStatus(Request $request){
        $status = $request->input('status');
        $xdo_env = XdoEnv::where("name",'debug')->first();
        $xdo_env->status = $status;
        $xdo_env->save();
        return redirect(route('admin'));
    }

}
