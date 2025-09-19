@extends('layouts.app')

@section('title', '新規会員登録 - STEP1')

@section('content')
<div class="auth-card">
    <h1 class="brand">PiGLy</h1>
    <p>新規会員登録</p>
    <p>STEP2 体重データの入力</p>

    <form method="POST" action="{{ route('register.step2.store') }}">
        @csrf

        <div class="form-group">
            <label for="current_weight">現在の体重</label>
            <input id="current_weight" name="current_weight" type="text" value="{{ old('current_weight') }}"> kg
            @error('current_weight')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="target_weight">目標の体重</label>
            <input id="target_weight" name="target_weight" type="text" value="{{ old('target_weight') }}"> kg
            @error('target_weight')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit">アカウント作成</button>
    </form>
</div>
@endsection
