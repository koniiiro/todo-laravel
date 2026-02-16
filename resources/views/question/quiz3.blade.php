<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz3</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>名前</th>
            <th>種別</th>
            <th>作成日時</th>
            <th>更新日付</th>
        </tr>
        @foreach($quizzes as $quiz)
            <tr>
                <td>{{ $quiz->id }}</td>
                <td>{{ $quiz->name }}</td>
                <td>{{ $quiz->type }}</td>
                <td>{{ $quiz->created_at }}</td>
                <td>{{ $quiz->updated_at }}</td>
                <td>
                {{-- 編集リンク --}}
                <a href="{{ url('/quiz12/' . $quiz->id) }}">編集</a>
            </td>
            </tr>
            @endforeach
    </table>
</body>
</html>