<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\RoleController;

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
Route::group(['middleware'=>['is_login']],function(){
    Route::get('/register',[UserController::class, 'loadRegister']);
    Route::post('/register/store',[UserController::class, 'register'])->name('register');
    Route::post('/questions/store',[QuestionController::class, 'store'])->name('questions.store');
    Route::get('/questions',[QuestionController::class, 'showQuestions'])->name('questions');
    Route::get('/login',[UserController::class,'loadLogin'])->name('login.page');
    Route::post('/login',[UserController::class,'userLogin'])->name('login');
});

Route::group(['middleware'=>['is_logout','checkRole:admin']],function(){
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
    Route::get('/logout',[UserController::class,'logout'])->name('logout');
    Route::get('/logout',[UserController::class,'logout'])->name('logout');
    Route::get('/role', [RoleController::class, 'index'])->name('role.index');
    Route::get('/role/destroy/{id}', [RoleController::class, 'destroy'])->name('user.destroy');
    Route::get('/role/edit/{id}', [RoleController::class, 'edit'])->name('user.edit');
    Route::post('/role/update/{id}', [RoleController::class, 'update'])->name('user.update');

});

Route::get('/', function () {
    return view('welcome');
});