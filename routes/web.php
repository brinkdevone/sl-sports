<?php

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

use App\Article;
use App\ContactUS;
use App\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

Route::get('/admin', function () {
    return view('admin.dashboard');
})->name('dashboard');

Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function (){
    Route::resource('/users', 'UsersController', ['except' => ['show', 'create', 'store']]);
});

Route::get('/', 'HomeController@index')->middleware('verified')->name('homepage');

Route::get('/aboutus', function () {
    return view('aboutus.aboutus');
})->name('aboutus');

Auth::routes(['verify' => true]);

Route::get('profile', 'UserProfileController@show')->middleware('auth')->name('profile.show');
Route::post('profile', 'UserProfileController@update')->middleware('auth')->name('profile.update');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/pricing', function () {
    return view('links.price');
})->name('pricing');

Route::resource('articles', 'ArticleController');

Route::get('/articles/{article}/comments', function (Article $article) {
    return $article->comments;
});

Route::resource('events', 'EventController');

Route::get('/events/{event}/comments', function (Event $event) {
    return $event->comments;
});

Route::resource('aboutus', 'AboutController');

Route::resource('tasks', 'taskController', ['except' => ['show']]);

Route::get('dashboard', 'DashboardController@loadUsers');
