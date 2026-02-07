<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>quiz7</title>
</head>
<body>
    <a href="{{ url('/quiz6') }}">quiz6の画面にurl関数で移動する</a>
    <br>
    <a href="{{ route('quiz6_test') }}">quiz6の画面にroute関数で移動する</a>
    <br>
    <a href="{{ url('/quiz9/' . $quiz->id) }}">quiz9の画面にurl関数で移動する</a>
    <br>
    <a href="{{ route('quiz9_test', ['id' => $quiz->id]) }}">quiz9の画面にroute関数で移動する</a>
    <br>
    <!-- フォームを追加 -->
    <form action="{{ url('/quiz9/' . $quiz->id) }}" method="POST">
        @csrf
        <button type="submit">送信ボタン</button>
    </form>

</body>
</html>