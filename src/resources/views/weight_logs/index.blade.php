@extends('layouts.app')

@section('title', '体重管理画面')

@section('content')
<div class="auth-card">
    <h1 class="brand">PiGLy</h1>
    <p>体重管理画面</p>

    {{-- 目標体重・差分・最新体重 --}}
    <div class="summary">
        <p>目標体重: {{ $target->target_weight ?? '未設定' }} kg</p>
        <p>目標まで: 
            @if ($target && $logs->isNotEmpty())
                {{ $logs->first()->weight - $target->target_weight }} kg
            @else
                -
            @endif
        </p>
        <p>最新体重: 
            @if ($logs->isNotEmpty())
                {{ $logs->first()->weight }} kg
            @else
                -
            @endif
        </p>
    </div>

    {{-- 体重ログ一覧 --}}
    <h2>体重ログ</h2>
    <table border="1" cellpadding="5">
        <thead>
            <tr>
                <th>日付</th>
                <th>体重</th>
                <th>食事量(カロリー)</th>
                <th>運動時間</th>
                <th>運動内容</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($logs as $log)
                <tr>
                    <td>{{ $log->date }}</td>
                    <td>{{ $log->weight }} kg</td>
                    <td>{{ $log->calories ?? '-' }}</td>
                    <td>{{ $log->exercise_time ?? '-' }}</td>
                    <td>{{ $log->exercise_content ?? '-' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">まだデータがありません。</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
