<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Controller;
use App\Models\Quiz;
use App\Models\Company;  // quiz11で追加
use App\Models\Sale;     // quiz11で追加
use Illuminate\Routing\Controller; 
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
        // // quiz7.blade.phpを表示
        // return view('question.quiz7');
        
        // first()で、抽出対象データのうち初めの1件のみを取得
        $quiz = Quiz::first();
        return view('question.quiz7', compact('quiz'));
    }

        // Quiz8用の関数（最新）- リダイレクト処理のみ
     public function quiz8_redirect()
     {
            // first()で、抽出対象データのうち初めの1件のみを取得
        $quiz = Quiz::first();
        return view('question.quiz7', compact('quiz'));
    }
        // Quiz9用の関数（最新）
    public function quiz9_show($id)
    {
        // 受け取ったidを元にQuizテーブルをfind関数でデータを抽出
        $quiz = Quiz::find($id);
        
        // Bladeファイルに送る
        return view('question.quiz9', compact('quiz'));
    }
    public function quiz10_show()
    {
        //クイズ登録画面を表示させる処理だけ行うこと
        return view('question.quiz10');
    }

    // Qui10_store関数 - 登録処理
    public function quiz10_store(Request $request)
    {
        // 1. 入力内容のバリデーションを行う
        $request->validate([
            'name' => 'required|max:30', // 必須、30文字以内
            'type' => 'required',        // 必須
            ]);

        // 2. QUIZテーブルへの登録処理（create関数）
        QUIZ::create([
            'name' => $request->input('name'),
            'type' => $request->input('type'),
        ]);

        // 3. クイズ登録画面にリダイレクト
        return redirect('/quiz10')->with('success', '登録しました！');;
    }

    // Quiz11用の関数（最新）
    public function quiz11_show_all()
    {
        // all関数を用いてCompaniesテーブルとSalesテーブルから全件取得する
        $companies = Company::all();
        $sales = Sale::all();
        
        return view('question.quiz11', compact('companies', 'sales'));
    }

// Quiz11 - get関数で条件付き取得（最新）
    public function quiz11_show_get()
    {
        // Companiesテーブル: 創立日が3月 かつ 住所に「テスト2」が含まれる
        $companies = Company::where('founding_date', 'LIKE', '%-03-%')
                            ->where('address', 'LIKE', '%テスト2%')
                            ->get();
        
        // Salesテーブル: 会社ID=2 または 売上>8000、売上降順
        $sales = Sale::where('company_id', '=', 2)
                    ->orWhere('sales', '>', 8000)
                    ->orderBy('sales', 'desc')
                    ->get();
        
        return view('question.quiz11', compact('companies', 'sales'));
    }
}