<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WeightLog;
use App\Models\WeightTarget;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\WeightLogRequest;

class WeightLogController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $weightLogs = WeightLog::where('user_id', $userId)
            ->orderBy('date', 'desc')
            ->paginate(8);

        $target = WeightTarget::where('user_id', $userId)->first();
        $currentWeight = optional($weightLogs->first())->weight ?? null;
        $diff = $currentWeight && $target ? $currentWeight - $target->target_weight : null;

        return view('weight_logs.index', compact('weightLogs', 'target', 'currentWeight', 'diff'));
    }

    public function store(WeightLogRequest $request)
    {
        WeightLog::create([
            'user_id' => Auth::id(),
            'date' => $request->input('date'),
            'weight' => $request->input('weight'),
            'calories' => $request->input('calories'),
            'exercise_time' => $request->input('exercise_time'),
            'exercise_content' => $request->input('exercise_content'),
        ]);

        return redirect('/weight_logs');
    }

    // 編集画面を表示
    public function edit($id)
    {
        $weightLog = WeightLog::findOrFail($id);

        if ($weightLog->user_id !== Auth::id()) {
            abort(403);
        }

        return view('weight_logs.edit', compact('weightLog'));
    }

    // 更新処理
    public function update(WeightLogRequest $request, $id)
    {
        $weightLog = WeightLog::findOrFail($id);

        if ($weightLog->user_id !== Auth::id()) {
            abort(403);
        }

        $weightLog->update($request->validated());

        return redirect('/weight_logs');
    }
    public function destroy($id)
{
    $weightLog = WeightLog::findOrFail($id);

    if ($weightLog->user_id !== Auth::id()) {
        abort(403);
    }

    $weightLog->delete();

    return redirect('/weight_logs');
}
public function create()
{
    $today = now()->format('Y-m-d');
    return view('weight_logs.create', compact('today'));
}
}