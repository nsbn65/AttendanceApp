<link rel="stylesheet" href="css/login.css"/>

@extends('layouts.layouts')

@section('content')
    <div class="container">
        <p class = "ttl-login">ログイン</h2>
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <div class = "wrapper">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <input class="input email" type="email" name="email" :value="old('email')" placeholder="メールアドレス" required autofocus >
                </div>

                <!-- Password -->
                <div>
                    <input class="input password" type="password" name="password" required autocomplete="current-password" placeholder="パスワード">
                </div>
                    <button class="btn-login">
                        {{ __('ログイン') }}
                    </button>
                </div>
            </form>
            <p class="text">アカウントをお持ちでない方はこちらから</p>
            <p class="register"><a class = "btn-register" href="/register">会員登録</a></p>
        </div>
    </div>
@endsection