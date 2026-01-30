<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;

class QuizController extends Controller
{
    public function show()
    {
       // ①Quizzesテーブルからデータを取得
        $quizzes = Quiz::get();
        
        // ②compact関数でビューに渡す
        return view('question.quiz3', compact('quizzes'));
    }
}
