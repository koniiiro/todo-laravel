<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>会員登録</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
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
        
        h1 {
            color: #333;
            margin-bottom: 30px;
            text-align: center;
            font-size: 24px;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
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
            transition: border-color 0.3s;
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
        
           .submit-button {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 20px;
        }
        
        .submit-button:hover {
            background-color: #45a049;
        }
        
        .required {
            color: #dc3545;
        }
    </style>

</head>
    <body>
    <div class="container">
        <h1>会員登録</h1>
        
        <!-- フォーム開始 -->
        <form action="/register" method="POST">
            @csrf
            
            <!-- 名前入力 -->
            <div class="form-group">
                <label for="name">名前 <span class="required">*</span></label>
                <input 
                    type="text" 
                    id="name" 
                    name="name" 
                    value="{{ old('name') }}"
                    placeholder="名前を入力してください"
                >
                @error('name')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            
            <!-- 電話番号入力 -->
            <div class="form-group">
                <label for="phone">電話番号 <span class="required">*</span></label>
                <input 
                    type="text" 
                    id="phone" 
                    name="phone" 
                    value="{{ old('phone') }}"
                    placeholder="電話番号を入力してください"
                >
                @error('phone')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            
            <!-- メールアドレス入力 -->
            <div class="form-group">
                <label for="email">メールアドレス <span class="required">*</span></label>
                <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    value="{{ old('email') }}"
                    placeholder="メールアドレスを入力してください"
                >
                @error('email')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            
            <!-- 登録ボタン -->
            <button type="submit" class="submit-button">登録</button>
        </form>
    </div>
</body>
</html>

