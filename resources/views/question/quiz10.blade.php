@extends('common.main')

@section('content')
<h1>クイズ登録画面</h1>

{{-- エラーメッセージの表示 --}}
@if ($errors->any())
<div style="color: red;">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif


<!-- **解説:**
- `$errors`: バリデーションエラーを格納した変数（Laravelが自動で用意）
- `$errors->any()`: エラーがあるかチェック
- `$errors->all()`: 全てのエラーメッセージを取得
- エラーがある場合のみ表示

**表示される例:**
```
- The name field is required. (名前は必須です)
- The name must not be greater than 30 characters. (名前は30文字以内です) -->


<form action="{{ url('/quiz10/store') }}" method="POST">
    @csrf 

    <p>名前を入力</p>
    <input type="text" name="name" value="{{ old('name') }}">

    <p>数値を入力</p>
    <input type="number" name="type" value="{{ old('type') }}">

    <!-- *解説:**
- `old('name')`: 前回入力した値を取得
- バリデーションエラー時、入力した値を保持
- ユーザーが再入力する手間を省く

**動作例:**
```
1. ユーザーが「テストクイズ」と入力して送信
2. バリデーションエラー（例: typeが未入力）
3. 入力画面に戻る
4. nameには「テストクイズ」が残っている ← old()のおかげ -->

    <br>
    <button type="submit">送信ボタン</button>
</form>

@endsection

