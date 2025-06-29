<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterStep2Controller;
use App\Http\Controllers\WeightLogController;
use App\Http\Controllers\WeightTargetController;

// 認証不要のルート
Route::get('/', function () {
    return view('welcome');
});

// 会員登録 Step2
Route::get('/register/step2', [RegisterStep2Controller::class, 'create'])->middleware('auth');
Route::post('/register/step2', [RegisterStep2Controller::class, 'store'])->middleware('auth');

// 認証が必要なルートグループ
Route::middleware('auth')->group(function () {
    // 一覧・登録
    Route::get('/weight_logs', [WeightLogController::class, 'index']);
    Route::get('/weight_logs/create', [WeightLogController::class, 'create']); 
    Route::post('/weight_logs', [WeightLogController::class, 'store']);

    // 編集・更新・削除
    Route::get('/weight_logs/{id}/update', [WeightLogController::class, 'edit']);
    Route::post('/weight_logs/{id}/update', [WeightLogController::class, 'update']);
    Route::get('/weight_logs/{id}/delete', [WeightLogController::class, 'destroy']);

    // 検索
    Route::get('/weight_logs/search', [WeightLogController::class, 'search']);

    // 目標体重設定
    Route::get('/weight_logs/goal_setting', [WeightTargetController::class, 'edit']);
    Route::post('/weight_logs/goal_setting', [WeightTargetController::class, 'update']);
});