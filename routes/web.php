<?php

use App\Http\Controllers\Lazord\LazordController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('master');
});

Route::prefix('lazord/')->name('lazord.')->controller(LazordController::class)->group(function(){

    // صفحات GET
    Route::get('/index', 'index')->name('index');
    Route::get('/lab-services', 'services')->name('lab-services');
    Route::get('/learn', 'learn')->name('learn');
    Route::get('/login', 'login')->name('login');
    Route::get('/pricing', 'pricing')->name('pricing');
    Route::get('/solutions', 'solutions')->name('solutions');
    Route::get('/why-lazord', 'whylazord')->name('why-lazord');

    // Dashboard
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::post('/ask-question', 'askQuestion')->name('ask.question');

    // Admin
    Route::get('/admin/dashboard', 'adminDashboard')->name('admin.dashboard');
    Route::post('/admin/answer/{id}', 'answerQuestion')->name('admin.answer');

    // POST
    Route::post('/login', 'loginSubmit')->name('login.submit');
    Route::post('/contact', 'contactSubmit')->name('contact.submit');

    Route::post('/admin/order-status/{id}', 'updateOrderStatus')->name('admin.order.status');

  //  Route::get('/new-order', 'newOrder')->name('new.order');
Route::post('/submit-order', 'submitOrder')->name('order.submit');
Route::post('/submit-review', 'submitReview')->name('submit.review');

Route::post('/logout', 'logout')->name('logout');
});
