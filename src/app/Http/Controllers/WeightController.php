<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\WeightLog;
use App\Models\WeightTarget;

class WeightController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // ユーザーの目標体重（1件だけ）
        $target = WeightTarget::where('user_id', $user->id)->first();

        // ユーザーの体重記録一覧（新しい順）
        $logs = WeightLog::where('user_id', $user->id)
            ->orderBy('date', 'desc')
            ->get();

        return view('weight_logs.index', compact('user', 'target', 'logs'));
    }
}
