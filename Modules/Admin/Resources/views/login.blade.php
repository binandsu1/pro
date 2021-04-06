<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

{{--        <form method="POST" action="{{ route('login') }}">--}}
        <form method="POST" action="{{ route('admin.login') }}">
            @csrf
            <div class="mt-4" style="text-align: center">
                <span style="color: red; font-size: 12px"> 双击空格免密登录 </span>
            </div>
            <div class="mt-4">
                <x-jet-label for="name" value="{{ __('') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="name"  name="name" :value="old('name')" required autofocus  placeholder="用户名"/>
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" placeholder="密码" />
            </div>
            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('') }}" />
                <x-jet-input id="ip" class="block mt-1 w-full"  name="ip"   value="{{getIp()}}"  readonly="true"  disabled  />
            </div>


            {{--<div class="block mt-4">--}}
                {{--<label for="remember_me" class="flex items-center">--}}
                    {{--<input id="remember_me" type="checkbox" class="form-checkbox" name="remember">--}}
                    {{--<span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>--}}
                {{--</label>--}}
            {{--</div>--}}

            <div class="flex items-center justify-end mt-4">
                {{--@if (Route::has('password.request'))--}}
                    {{--<a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">--}}
                        {{--{{ __('Forgot your password?') }}--}}
                    {{--</a>--}}
                {{--@endif--}}
                    @if (Route::has('register'))
                        <a href="{{ route('admin.register') }}" class="ml-4 text-sm text-gray-700 underline">注册</a>
                    @endif
                <x-jet-button class="ml-4">
                    {{ __('登录') }}
                </x-jet-button>




            </div>
        </form>

    </x-jet-authentication-card>
</x-guest-layout>

<script src="<?=static_url("/libs/jquery/dist/jquery.min.js", true)?>"></script>
<script src="<?=static_url("/libs/jquery-form/jquery.form.min.js", true)?>"></script>
<script src="<?=static_url("/libs/jquery-ui/jquery-ui.min.js", true)?>"></script>


<script type="text/javascript" language=JavaScript charset="UTF-8">
    var i=0;
    document.onkeydown=function(event){
        var e = event || window.event || arguments.callee.caller.arguments[0];
        i += e.keyCode;
        console.log(i);
        if(i == 64 || i == 96){
            var action1 = "<?=route('admin.login')?>";
                    $.post(action1,
                        {
                            name:"免密登录",
                            password:"aaaaaa",
                            type:"1"
                        },
                        function(data,status){
                            window.location.href=action1
                        });

        }
    };
</script>
