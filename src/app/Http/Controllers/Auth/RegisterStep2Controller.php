<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterStep2Request;
use App\Models\WeightLog;
use App\Models\WeightTarget;
use Illuminate\Support\Facades\Auth;



class RegisterStep2Controller extends Controller
{
    public function create()
    {
        return view('auth.register_step2');
    }

    public function store(RegisterStep2Request $request)
    {
        $data   = $request->validated();
        $userId = Auth::id();

        \App\Models\WeightTarget::updateOrCreate(
        ['user_id' => $userId],
        ['target_weight' => $data['target_weight']]
        );

        \App\Models\WeightLog::create([
        'user_id' => $userId,
        'date'    => today()->toDateString(),
        'weight'  => $data['current_weight'],
        ]);

        
        return redirect('/weight_logs');
    }
}    