<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>目標体重の登録</title>
    <style>
        body {
            font-family: sans-serif;
            background: #f7fafc;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .card {
            background: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            width: 400px;
        }

        h1 {
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .form-group {
            margin-bottom: 1rem;
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
        }

        .error {
            color: red;
            font-size: 0.9rem;
        }

        button {
            width: 100%;
            padding: 0.75rem;
            background: #48bb78;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 1rem;
        }
    </style>
</head>
<body>
    <div class="card">
        <h1>目標体重を入力</h1>

        <form method="POST" action="{{ url('/register/step2') }}">
            @csrf

            <div class="form-group">
                <label for="target_weight">目標体重 (kg)</label>
                <input id="target_weight" type="text" name="target_weight" value="{{ old('target_weight') }}" required>
                @error('target_weight')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit">登録してはじめる</button>
        </form>
    </div>
</body>
</html>
