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

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('用户名') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="name" name="name" :value="old('name')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('密码') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>
            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <input id="remember_me" type="checkbox" class="form-checkbox" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                {{--@if (Route::has('password.request'))--}}
                    {{--<a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">--}}
                        {{--{{ __('Forgot your password?') }}--}}
                    {{--</a>--}}
                {{--@endif--}}
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">注册</a>
                    @endif
                <x-jet-button class="ml-4">
                    {{ __('登录') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
