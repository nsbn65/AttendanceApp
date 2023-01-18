<link rel="stylesheet" href="css/register.css"/>

@extends('layouts.layouts')

@section('content')
<div class="container">
    <h2 class = "ttl-register">会員登録</h2>

    <!-- Validation Errors -->
    <x-auth-validation-errors class="errors" :errors="$errors" />
    <div class = "wrapper">
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <input type="text" name="name" class="input name" :value="old('name')" placeholder="名前"  required autofocus >
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <input type="email" name="email" class="input email" :value="old('email')" placeholder="メールアドレス"  required autofocus >
            </div>

            <!-- Password -->
            <div class="mt-4">
                <input type="password" name="password" class="input password" placeholder="パスワード"  required autocomplete="new-password" >
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <input type="password" name="password_confirmation" class="input password-confirmation" placeholder="確認用パスワード" required >
            </div>

            <button class="btn-register">
                {{ __('会員登録') }}
            </button>
            
            <p class="text">アカウントをお持ちの方はこちらから</p>
            <p class="login"><a class = "btn-login" href="{{ route('login') }}"> 
                {{ __('ログイン') }}</a>
        </form>
    </div>
</div>
@endsection
