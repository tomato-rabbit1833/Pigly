<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\WeightTarget;

class WeightTargetController extends Controller
{
    public function edit()
    {
        $target = WeightTarget::where('user_id', Auth::id())->first();

        return view('weight_target.edit', compact('target'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'target_weight' => [
                'required',
                'regex:/^\d{1,4}(\.\d)?$/',
            ],
        ], [
            'target_weight.required' => '目標の体重を入力してください',
            'target_weight.regex' => '小数点は1桁で4桁までの数字で入力してください',
        ]);

        $target = WeightTarget::firstOrCreate(
            ['user_id' => Auth::id()],
            ['target_weight' => $request->input('target_weight')]
        );

        $target->target_weight = $request->input('target_weight');
        $target->save();

        return redirect('/weight_logs');
    }
}