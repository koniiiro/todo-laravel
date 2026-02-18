<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>会員編集</title>

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f5f5;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: white;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        h1 { color: #333; font-size: 24px; margin-bottom: 8px; }
        .member-id { color: #6c757d; font-size: 14px; }
        .form-group { margin-bottom: 20px; }
        label {
            display: block;
            margin-bottom: 8px;
            color: #495057;
            font-weight: 500;
        }
        input[type="text"],
        input[type="email"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            font-size: 14px;
        }
        input:focus {
            outline: none;
            border-color: #007bff;
        }
        .error-message {
            color: #dc3545;
            font-size: 13px;
            margin-top: 5px;
        }
        .update-button {
            width: 100%;
            background-color: #007bff;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 10px;
        }
        .update-button:hover { background-color: #0056b3; }
        .delete-button {
            width: 100%;
            background-color: #dc3545;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 10px;
        }
        .delete-button:hover { background-color: #c82333; }
        .back-link {
            display: block;
            width: 100%;
            background-color: #6c757d;
            color: white;
            padding: 12px;
            border-radius: 4px;
            font-size: 16px;
            text-align: center;
            text-decoration: none;
            margin-top: 10px;
        }
        .back-link:hover { background-color: #5a6268; }
        .divider {
            border: none;
            border-top: 1px solid #dee2e6;
            margin: 30px 0;
        }
        .required { color: #dc3545; }
    </style>
</head>
<body>
    <div class="container">

        {{-- ヘッダー --}}
        <div class="header">
            <h1>会員編集</h1>
            <p class="member-id">会員ID: {{ $member->id }}</p>
        </div>

        {{-- 編集フォーム --}}
        <form action="/edit/{{ $member->id }}" method="POST">
            @csrf
            @method('PUT')  {{-- PUTリクエストとして送信 --}}

            <div class="form-group">
                <label for="name">名前 <span class="required">*</span></label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name', $member->name) }}"
                >
                @error('name')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="phone">電話番号 <span class="required">*</span></label>
                <input
                    type="text"
                    id="phone"
                    name="phone"
                    value="{{ old('phone', $member->phone) }}"
                >
                @error('phone')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">メールアドレス <span class="required">*</span></label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email', $member->email) }}"
                >
                @error('email')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="update-button">編集</button>
        </form>

        <hr class="divider">

        {{-- 削除フォーム（編集フォームとは別のフォーム） --}}
        <form action="/edit/{{ $member->id }}" method="POST"
              onsubmit="return confirm('本当に削除しますか？')">
            @csrf
            @method('DELETE')  {{-- DELETEリクエストとして送信 --}}

            <button type="submit" class="delete-button">削除</button>
        </form>

        <a href="/top" class="back-link">戻る</a>

    </div>
</body>
</html>