<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
       {{-- 問題① @authディレクティブ --}}
    <h2>ログイン済み</h2>
    @auth
        <p>ログイン済み</p>
    @else
        <p>未ログイン</p>
    @endauth

    {{-- 問題② @guestディレクティブ --}}
    <h2>未ログイン</h2>
    @guest
        <p>未ログインです</p>
    @else
        <p>ログイン済みです</p>
    @endguest

</body>
</html>