<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\MemberController;  // ← 会員登録システムで追加

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Quiz2用（学習記録）
Route::get('/quiz2', [QuizController::class, 'index']);

// Quiz3用（学習記録）
Route::get('/quiz3', [QuizController::class, 'show']);

// Quiz4用（学習記録）
Route::get('/quiz4', [QuizController::class, 'quiz4_show']);

// Quiz5用（学習記録）
Route::get('/quiz5', [QuizController::class, 'login']);

Route::get('/quiz6_main', function () {
    return view('common.main');
    });
    
// Quiz6用（学習記録）
Route::get('/quiz6', [QuizController::class, 'quiz6_show'])->name('quiz6_test');

// Quiz7用（学習記録）
Route::get('/quiz7', [QuizController::class, 'quiz7_show']);

// Quiz8用（学習記録）- リダイレクト
Route::get('/quiz8', [QuizController::class, 'quiz8_redirect']);

// Quiz9用（学習記録）
Route::get('/quiz9/{id}', [QuizController::class, 'quiz9_show'])->name('quiz9_test');
Route::post('/quiz9/{id}', [QuizController::class, 'quiz9_show']);

// Quiz10用（学習記録）
Route::get('/quiz10', [QuizController::class, 'quiz10_show'])->name('quiz10_test');
Route::post('/quiz10/store', [QuizController::class, 'quiz10_store'])->name('quiz10_test2');

// Quiz11用（学習記録）
Route::get('/quiz11/all', [QuizController::class, 'quiz11_show_all']);
Route::get('/quiz11/get', [QuizController::class, 'quiz11_show_get']); 
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Quiz12用（最新）
// 編集画面を表示（GET）
Route::get('/quiz12/{id}', [QuizController::class, 'quiz12_show'])->name('quiz12_test');
// 更新処理（POST）
Route::post('/quiz12/update/{id}', [QuizController::class, 'quiz12_update'])->name('quiz12_test2');

// ========== 会員登録システムのルート ==========

// 会員一覧画面
Route::get('/top', [MemberController::class, 'top'])->name('top');

// 会員登録画面を表示する（GETリクエスト）
Route::get('/register', [MemberController::class, 'register'])->name('register');

// 会員登録処理を実行する（POSTリクエスト）
Route::post('/register', [MemberController::class, 'store'])->name('member.store');

// ===== 編集関連 =====

// 編集画面の表示（GETリクエスト）
Route::get('/edit/{id}', [MemberController::class, 'edit'])->name('edit');

// 更新処理（PUTリクエスト）
Route::put('/edit/{id}', [MemberController::class, 'update'])->name('member.update');

// 削除処理（DELETEリクエスト）
Route::delete('/edit/{id}', [MemberController::class, 'destroy'])->name('member.destroy');
