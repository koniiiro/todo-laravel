<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @extends('common.main')

    @section('content')
    @foreach($quizzes as $quiz)
        <div>
            <p>ID:{{ $quiz->id }}</p>
            <p>名前：{{ $quiz->name }}</p>
            <p>種別：{{ $quiz->type }}</p>
            <p>作成日：{{ $quiz->created_at }}</p>
            <p>更新日：{{ $quiz->updated_at }}</p>
        </div>
    @endforeach
    @endsection

</body>
</html>