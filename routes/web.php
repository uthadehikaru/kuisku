<?php

use App\Http\Controllers\WelcomeController;
use App\Livewire\LoginForm;
use App\Livewire\QuizDetail;
use App\Livewire\QuizForm;
use App\Livewire\QuizResult;
use App\Livewire\QuizSession;
use App\Livewire\RegisterForm;
use Illuminate\Support\Facades\Route;

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

Route::get('/', WelcomeController::class)->name('home');
Route::get('login', LoginForm::class)->name('login');
Route::view('quiz-list', 'quiz-list')->name('quiz.list');
Route::get('quiz/{code}', QuizDetail::class)->name('quiz.detail');
Route::get('register', RegisterForm::class)->name('register');
Route::get('logout', function () {
    Auth::logout();

    return redirect()->route('login');
})->name('logout');

Route::middleware('auth')->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
    Route::get('session', QuizSession::class)->name('quiz.session');
    Route::get('result/{code}', QuizResult::class)->name('quiz.result');
    Route::get('form/quiz/{code?}', QuizForm::class)->name('quiz.form');
});
