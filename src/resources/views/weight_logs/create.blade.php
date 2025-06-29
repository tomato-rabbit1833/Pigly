<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>体重記録の新規登録</title>
    <style>
        body {
            font-family: sans-serif;
            background: #f7fafc;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .card {
            background: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 400px;
        }

        h1 {
            text-align: center;
            margin-bottom: 1.5rem;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
        }

        input[type="text"],
        input[type="date"],
        input[type="time"],
        textarea {
            width: 100%;
            padding: 0.5rem;
            border-radius: 4px;
            border: 1px solid #ccc;
            margin-bottom: 1rem;
        }

        .error {
            color: red;
            font-size: 0.9rem;
            margin-top: -0.5rem;
            margin-bottom: 1rem;
        }

        .buttons {
            display: flex;
            justify-content: space-between;
        }

        .buttons button,
        .buttons a {
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 4px;
            font-size: 1rem;
            text-decoration: none;
            color: white;
        }

        .buttons button {
            background-color: #48bb78;
        }

        .buttons a {
            background-color: #718096;
        }
    </style>
</head>
<body>
    <div class="card">
        <h1>体重記録を追加</h1>

        <form action="{{ url('/weight_logs') }}" method="POST">
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

            <div class="buttons">
                <button type="submit">登録</button>
                <a href="{{ url('/weight_logs') }}">戻る</a>
            </div>
        </form>
    </div>
</body>
</html>
