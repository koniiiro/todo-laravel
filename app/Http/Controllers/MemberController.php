<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
 /**
     * 会員一覧画面を表示
     *
     * URL: GET /top
     */
    public function top()
    {
        // ① DBから全会員データを取得
        $members = Member::all();

        // ② 取得したデータをビューに渡して表示
        return view('top', compact('members'));
    }
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

        // // 一時的な確認用：保存したデータを表示
        // dd($member);  // ← この行を追加（一時的）

        // ステップ3: 一覧画面にリダイレクト（成功メッセージ付き）
        return redirect('/top')->with('success', '会員を登録しました');
    }

 /**
 * 【第3段階で追加】編集画面を表示
 *
 * URL: GET /edit/{id}
 * 役割: 特定の会員データを取得してフォームに表示
 */
public function edit($id)
{
    // IDで特定の会員データを1件取得
    $member = Member::findOrFail($id);

    // edit.blade.php にデータを渡して表示
    return view('edit', compact('member'));
}

/**
 * 【第3段階で追加】更新処理
 *
 * URL: PUT /edit/{id}
 * 役割: フォームの入力内容でデータベースを更新
 */
public function update(Request $request, $id)
{
    // バリデーション（登録時と同じ）
    $validated = $request->validate([
        'name' => 'required|max:15',
        'phone' => 'required|max:15',
        'email' => 'required|email|max:254',
    ], [
        'name.required' => '名前は必須です',
        'name.max' => '名前は15文字以内で入力してください',
        'phone.required' => '電話番号は必須です',
        'phone.max' => '電話番号は15文字以内で入力してください',
        'email.required' => 'メールアドレスは必須です',
        'email.email' => '正しいメールアドレス形式で入力してください',
        'email.max' => 'メールアドレスは254文字以内で入力してください',
    ]);

    // IDで会員を検索して更新
    $member = Member::findOrFail($id);
    $member->update($validated);

    // 一覧画面にリダイレクト
    return redirect('/top')->with('success', '会員情報を更新しました');
}

/**
 * 【第3段階で追加】削除処理
 *
 * URL: DELETE /edit/{id}
 * 役割: 特定の会員データを削除
 */
public function destroy($id)
{
    // IDで会員を検索して削除
    $member = Member::findOrFail($id);
    $member->delete();

    // 一覧画面にリダイレクト
    return redirect('/top')->with('success', '会員を削除しました');
}

}
