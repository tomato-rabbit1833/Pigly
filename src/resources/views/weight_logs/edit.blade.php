<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>目標体重の設定</title>
    <style>
        body {
            font-family: sans-serif;
            background: #edf2f7;
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

        input[type="text"] {
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
            background-color: #48bb78; /* 緑 */
        }

        .buttons a {
            background-color: #718096; /* グレー */
        }
    </style>
</head>
<body>
    <div class="card">
        <h1>目標体重の設定</h1>

        <form action="{{ url('/weight_logs/goal_setting') }}" method="POST">
            @csrf

            <label>目標体重（kg）</label>
            <input type="text" name="target_weight" value="{{ old('target_weight', $target->target_weight ?? '') }}">
            @error('target_weight') <div class="error">{{ $message }}</div> @enderror

            <div class="buttons">
                <button type="submit">更新</button>
                <a href="{{ url('/weight_logs') }}">戻る</a>
            </div>
        </form>
    </div>
</body>
</html>