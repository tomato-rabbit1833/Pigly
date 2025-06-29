<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>体重管理画面</title>
    <style>
        body {
            font-family: sans-serif;
            background: #f0f4f8;
            margin: 0;
            padding: 2rem;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background: #fff;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        h1, h2 {
            text-align: center;
            margin-bottom: 1rem;
        }

        .stats p {
            margin: 0.5rem 0;
            font-size: 1.1rem;
        }

        .actions {
            text-align: center;
            margin: 1.5rem 0;
        }

        .actions a,
        .actions button {
            display: inline-block;
            margin: 0.3rem;
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 4px;
            background: #4299e1;
            color: white;
            text-decoration: none;
            cursor: pointer;
        }

        .actions button {
            background: #48bb78;
        }

        .modal {
            background: #f9fafb;
            padding: 1rem;
            border: 1px solid #ccc;
            border-radius: 6px;
            margin-top: 1rem;
        }

        .modal input, .modal textarea {
            width: 100%;
            padding: 0.5rem;
            margin-top: 0.3rem;
            margin-bottom: 1rem;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        .error {
            color: red;
            font-size: 0.9rem;
        }

        ul.log-list {
            list-style: none;
            padding: 0;
        }

        ul.log-list li {
            background: #edf2f7;
            margin-bottom: 0.5rem;
            padding: 0.8rem;
            border-radius: 5px;
        }

        .pagination {
            text-align: center;
            margin-top: 2rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>体重管理画面</h1>

        <div class="stats">
            <p>目標体重：{{ $target->target_weight ?? '未設定' }} kg</p>
            <p>現在体重：{{ $currentWeight ?? '未登録' }} kg</p>
            <p>差分：{{ $diff !== null ? number_format($diff, 1) : '---' }} kg</p>
        </div>

        <div class="actions">
            <a href="{{ url('/weight_logs/create') }}">ページ形式で追加</a>
            <button onclick="document.getElementById('modal').style.display='block'">モーダルで追加</button>
        </div>

        {{-- モーダル --}}
        <div id="modal" class="modal" style="display:none;">
            <form action="/weight_logs" method="POST">
                @csrf
                <label>日付
                    <input type="date" name="date" value="{{ old('date', date('Y-m-d')) }}">
                    @error('date') <div class="error">{{ $message }}</div> @enderror
                </label>

                <label>体重
                    <input type="text" name="weight" value="{{ old('weight') }}">
                    @error('weight') <div class="error">{{ $message }}</div> @enderror
                </label>

                <label>摂取カロリー
                    <input type="text" name="calories" value="{{ old('calories') }}">
                    @error('calories') <div class="error">{{ $message }}</div> @enderror
                </label>

                <label>運動時間
                    <input type="time" name="exercise_time" value="{{ old('exercise_time') }}">
                    @error('exercise_time') <div class="error">{{ $message }}</div> @enderror
                </label>

                <label>運動内容
                    <textarea name="exercise_content">{{ old('exercise_content') }}</textarea>
                    @error('exercise_content') <div class="error">{{ $message }}</div> @enderror
                </label>

                <div class="actions">
                    <button type="submit">登録</button>
                    <a href="javascript:void(0)" onclick="document.getElementById('modal').style.display='none'">閉じる</a>
                </div>
            </form>
        </div>

        <h2>記録一覧</h2>
        <ul class="log-list">
            @foreach ($weightLogs as $log)
                <li>
                    {{ \Carbon\Carbon::parse($log->date)->format('Y/m/d') }}：
                    {{ $log->weight }} kg /
                    {{ $log->calories }} kcal /
                    {{ \Carbon\Carbon::parse($log->exercise_time)->format('H:i') }} /
                    {{ $log->exercise_content ?? 'なし' }}
                </li>
            @endforeach
        </ul>

        <div class="pagination">
            {{ $weightLogs->links() }}
        </div>
    </div>
</body>
</html>