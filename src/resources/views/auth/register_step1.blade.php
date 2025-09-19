@extends('layouts.app')

@section('title', '新規会員登録 - STEP1')

@section('content')
<div class="auth-card">
    <h1 class="brand">PiGLy</h1>
    <p>新規会員登録</p>
    <p>STEP1 アカウント情報の登録</p>

    <form method="POST" action="{{ route('register.step1.store') }}">
        @csrf

        <div class="form-group">
            <label for="name">お名前</label>
            <input id="name" name="name" type="text" value="{{ old('name') }}">
            @error('name')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

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

        <button type="submit">次に進む</button>
    </form>

    <p><a href="{{ route('login') }}">ログインはこちら</a></p>
</div>
@endsection
