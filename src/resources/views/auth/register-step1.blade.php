<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>アカウント作成</title>
    <style>
        body {
            font-family: sans-serif;
            background: #f8fafc;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .card {
            background: #fff;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
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

        input[type="text"],
        input[type="email"],
        input[type="password"] {
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
            background: #38b2ac;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 1rem;
        }

        a {
            display: block;
            text-align: center;
            margin-top: 1rem;
            color: #38b2ac;
        }
    </style>
</head>
<body>
    <div class="card">
        <h1>アカウント作成</h1>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group">
                <label for="name">名前</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required>
                @error('name')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">メールアドレス</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required>
                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">パスワード</label>
                <input id="password" type="password" name="password" required>
                @error('password')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password_confirmation">パスワード確認</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required>
            </div>

            <button type="submit">次へ</button>
        </form>
    </div>
</body>
</html>