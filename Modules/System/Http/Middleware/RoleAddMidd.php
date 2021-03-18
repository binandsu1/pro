<?php

namespace Modules\System\Http\Middleware;

use Closure;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class RoleAddMidd extends FormRequest
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
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '角色必填',
            'name.min' => '角色最少二个字符',
            'name.max' => '角色最多十个字符',
        ];
    }


}
