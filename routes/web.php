<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizController;


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
Route::get('/quiz6', [QuizController::class, 'quiz6_show']);
