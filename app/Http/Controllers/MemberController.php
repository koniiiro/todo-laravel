<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{

 /**
     * 会員登録画面を表示
     * 
     * URL: GET /register
     * 役割: 登録フォームを表示するだけ
     */
    public function register()
    {
        // register.blade.php を表示
        return view('register');
    }

    /**
     * 会員登録処理
     * 
     * URL: POST /register
     * 役割: フォームから送信されたデータを保存
     */
    public function store(Request $request)
    {
        // ステップ1: バリデーション（入力チェック）
        $validated = $request->validate([
            'name' => 'required|max:15',
            'phone' => 'required|max:15',
            'email' => 'required|email|max:254',
        ], [
            // エラーメッセージを日本語化
            'name.required' => '名前は必須です',
            'name.max' => '名前は15文字以内で入力してください',
            'phone.required' => '電話番号は必須です',
            'phone.max' => '電話番号は15文字以内で入力してください',
            'email.required' => 'メールアドレスは必須です',
            'email.email' => '正しいメールアドレス形式で入力してください',
            'email.max' => 'メールアドレスは254文字以内で入力してください',
        ]);

        // ステップ2: データベースに保存
        Member::create($validated);

        // 一時的な確認用：保存したデータを表示
        dd($member);  // ← この行を追加（一時的）

        // ステップ3: 一覧画面にリダイレクト（成功メッセージ付き）
        return redirect('/top')->with('success', '会員を登録しました');
    }
}
