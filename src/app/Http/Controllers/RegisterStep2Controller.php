<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterStep2Request;
use App\Models\WeightTarget;
use Illuminate\Support\Facades\Auth;

class RegisterStep2Controller extends Controller
{
    public function create()
    {
        return view('auth.register-step2');
    }

    public function store(RegisterStep2Request $request)
    {
        WeightTarget::create([
            'user_id' => Auth::id(),
            'target_weight' => $request->input('target_weight'),
        ]);

        return redirect('/weight_logs');
    }
}
