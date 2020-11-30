<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     * 注册验证
     * @param  array  $input
     * @return \App\Models\User
     * $validator = Validator::make($input, $rules, $messages);
     */
    public function create(array $input)
    {

        Validator::make($input, [
            'name' => ['required', 'string', 'max:10','min:3'],
//            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
//            'password' => $this->passwordRules(),
            'password' =>  ['required', 'string', 'confirmed','max:20','min:3']
        ],$messages = [
            'name.required' => '请输入用户名',
            'name.min' => '用户名最少3字符',
            'name.max' => '用户名最多10字符',
            'password.required' => '请输入密码',
            'password.confirmed' => '两次密码输入不一致',
            'password.min' => '密码最少3字符',
            'password.max' => '密码最多20字符',
        ])->validate();



        return User::create([
            'name' => $input['name'],
//            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
