<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\OAuthController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Settings\ProfileController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Settings\PasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\BudgetController;
use App\Http\Controllers\RecurringController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => 'auth:api'], function () {
    Route::post('logout', [LoginController::class, 'logout']);

    Route::get('user', [UserController::class, 'current']);
    Route::patch('settings/profile', [ProfileController::class, 'update']);
    Route::patch('settings/password', [PasswordController::class, 'update']);
});

Route::group(['middleware' => 'guest:api'], function () {
    Route::post('login', [LoginController::class, 'login']);
    Route::post('register', [RegisterController::class, 'register']);

    Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail']);
    Route::post('password/reset', [ResetPasswordController::class, 'reset']);

    Route::post('email/verify/{user}', [VerificationController::class, 'verify'])->name('verification.verify');
    Route::post('email/resend', [VerificationController::class, 'resend']);

    Route::post('oauth/{driver}', [OAuthController::class, 'redirect']);
    Route::get('oauth/{driver}/callback', [OAuthController::class, 'handleCallback'])->name('oauth.callback');
});
Route::get('transactions', [TransactionController::class, 'index']);
Route::get('categories', [CategoryController::class, 'index']);
Route::get('accounts', [AccountController::class, 'index']);
Route::get('tags', [TagController::class, 'index']);
Route::get('recurrings', [RecurringController::class, 'index']);
Route::get('budgets/{month}/{year}', [BudgetController::class, 'show']);

Route::post('transactions', [TransactionController::class, 'store']);
Route::post('categories', [CategoryController::class, 'store']);
Route::post('tags', [TagController::class, 'store']);
Route::post('recurrings', [RecurringController::class, 'store']);
Route::patch('tags/{tag}', [TagController::class, 'update']);
Route::patch('categories/{category}', [CategoryController::class, 'update']);
Route::patch('budgets/{budget}', [BudgetController::class, 'update']);
Route::patch('recurrings/{recurring}', [RecurringController::class, 'update']);