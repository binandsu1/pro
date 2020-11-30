<?php

namespace Modules\Laravel\Http\Middleware;

use Closure;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ArtisanMidd extends FormRequest
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
            'title' => 'required',
            'name' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => '标题不能为空!',
            'name.required' => '命令不能为空!',
        ];
    }


}
