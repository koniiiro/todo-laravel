<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>会員一覧</title>
     <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f5f5;
            padding: 20px;
        }
        .container {
            max-width: 1000px;
            margin: 0 auto;
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }
        h1 { color: #333; font-size: 24px; }

        /* 登録リンク */
        .register-link {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 4px;
        }
        .register-link:hover { background-color: #45a049; }

        /* 成功メッセージ */
        .success-message {
            background-color: #d4edda;
            color: #155724;
            padding: 12px;
            border-radius: 4px;
            margin-bottom: 20px;
        }

        /* テーブル */
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th {
            background-color: #f8f9fa;
            padding: 12px;
            text-align: left;
            border-bottom: 2px solid #dee2e6;
        }
        td {
            padding: 12px;
            border-bottom: 1px solid #dee2e6;
        }
        tr:hover { background-color: #f8f9fa; }

        /* 編集リンク */
        .edit-link {
            background-color: #007bff;
            color: white;
            padding: 6px 12px;
            text-decoration: none;
            border-radius: 4px;
        }
        .edit-link:hover { background-color: #0056b3; }

        .no-data {
            text-align: center;
            padding: 40px;
            color: #6c757d;
        }
    </style>

</head>
<body>
     <div class="container">

        {{-- ヘッダー部分 --}}
        <div class="header">
            <h1>会員一覧</h1>
            <a href="/register" class="register-link">>> 登録</a>  {{-- 登録画面へのリンク --}}
        </div>

        {{-- 成功メッセージ（登録・更新・削除後に表示） --}}
        @if(session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif

        {{-- 会員データがある場合とない場合で表示を切り替え --}}
        @if($members->count() > 0)

            <table>
                <thead>
                    <tr>
                        <th>名前</th>
                        <th>電話番号</th>
                        <th>メールアドレス</th>
                        <th></th>  {{-- 編集リンク用の列 --}}
                    </tr>
                </thead>
                <tbody>
                    {{-- 全会員をループして1行ずつ表示 --}}
                    @foreach($members as $member)
                        <tr>
                            <td>{{ $member->name }}</td>
                            <td>{{ $member->phone }}</td>
                            <td>{{ $member->email }}</td>
                            <td>
                                {{-- 編集リンク（会員IDをURLに含める） --}}
                                <a href="/edit/{{ $member->id }}" class="edit-link">>> 編集</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        @else
            {{-- 会員が0人の場合 --}}
            <div class="no-data">
                登録されている会員はいません
            </div>
        @endif

    </div>

</body>
</html>