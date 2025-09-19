@extends('layouts.app')

@section('title', 'ログイン')

@section('content')
<div class="auth-card">
    <h1 class="brand">PiGLy</h1>
    <p>ログイン</p>

    <form method="POST" action="{{ route('login.attempt') }}">
        @csrf

        <div class="form-group">
            <label for="email">メールアドレス</label>
            <input id="email" name="email" type="email" value="{{ old('email') }}">
            @error('email')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">パスワード</label>
            <input id="password" name="password" type="password">
            @error('password')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit">ログイン</button>
    </form>

    <p><a href="{{ route('register.step1') }}">アカウント作成はこちら</a></p>
</div>
@endsection
