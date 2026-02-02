<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Controller;
use Illuminate\Routing\Controller; 
use App\Models\Quiz;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;


class QuizController extends Controller
{
    // Quiz2用の関数（学習記録）
        public function index()
    {
        // ②compact関数でビューに渡す
        return view('question.quiz2');
    }

    // Quiz3用の関数（学習記録）
    public function show()
    {
       // ①Quizzesテーブルからデータを取得
        $quizzes = Quiz::get();
        // ②compact関数でビューに渡す
        return view('question.quiz3', compact('quizzes'));
    }

     // Quiz4用の関数（学習記録）
    public function quiz4_show(){
       // ①Quizzesテーブルからデータを取得
        $fruits = "orange";
        // ②compact関数でビューに渡す
        return view('question.quiz4', compact('fruits'));
    }

    // Quiz5用の関数（学習記録）
    public function login(Request $request){
       // セッションの削除
        $request->session()->flush();
        // ログインユーザーの設定
        $user_info = array(
            'email' => 'techis@test',
            'password' => '1234',
        );
        // ログインチェック
        if (Auth::attempt($user_info)){
            // ログインに成功
            return view('question.quiz5');
        }
        // ログインに失敗
        // ※今回は学習のためどちらのパターンでもquiz5に画面遷移させる。
        return view('question.quiz5');
    }

    // Quiz6用の関数
     public function quiz6_show()
    {
        // Quizテーブルからデータを取得
        $quizzes = Quiz::get();
        
        // quiz6.blade.phpを開き、変数$quizzesを渡す
        return view('question.quiz6', compact('quizzes'));
    }

    // Quiz7用の関数
     public function quiz7_show()
     {
        // quiz7.blade.phpを表示
        return view('question.quiz7');
    }

        // Quiz8用の関数（最新）- リダイレクト処理のみ
     public function quiz8_redirect()
     {
        // quiz7にリダイレクト
        return redirect('/quiz7');
    }

}