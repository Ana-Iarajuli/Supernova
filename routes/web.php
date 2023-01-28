<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\UserController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name("welcome");

Route::get("/login", [AuthController::class, "loginPage"])->name("login");
Route::post("/login", [AuthController::class, "login"]);

Route::get("/register", [AuthController::class, "registerPage"])->name("register");
Route::post("/register", [AuthController::class, "register"]);


Route::get("/quiz", [QuizController::class, "quizList"])->name("mainPage");
Route::post("/quiz", [QuizController::class, "quizPublish"])->name("mainPage");

Route::get("/quiz/play/{name}", [QuizController::class, "quizPage"])->name("quiz.page");
Route::get("/AddQuiz", [QuizController::class, "addQuiz"])->name("addQuiz");
Route::post("/AddQuiz", [QuizController::class, "addQuiz"])->name("addQuiz");

Route::middleware('auth')->get("/logout", [AuthController::class, "logout"])->name("logout");
Route::middleware(['auth'])->group(function() {
    Route::get("/user", [UserController::class, "index"])->name("user.index");
    Route::post("/user", [QuizController::class, "addQuiz"])->name("user.index");
    Route::get("/user/quiz", [QuestionController::class, "showQuiz"])->name("user.quizzes");
    Route::post("/user/quiz", [QuestionController::class, "QuizQuestionCRUD"])->name("user.quizzes");
    Route::get('/{quiz}/questions', [QuestionController::class, "showQuestions"])->name("question.page");
    Route::post('/{quiz}/questions', [QuestionController::class, "questionUD"])->name("question.page");
});