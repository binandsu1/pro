<?php

namespace Modules\Curd\Http\Middleware;

use Closure;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class XdoDataMidd extends FormRequest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        return $next($request);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:2|max:10',
            'phone' => 'required|unique:investor',
            'phone' => 'regex:/^1[345789][0-9]{9}$/',
            'age' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '请输入姓名',
            'name.min' => '姓名最少二个字符',
            'name.max' => '姓名最多十个字符',
            'age.required' => '请输入年龄',
            'phone.required' => '请输入手机号',
            'phone.regex' => '手机号格式错误',
        ];
    }


}
