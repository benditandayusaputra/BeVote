<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/getDataChoice', 'ChoiceController@getData');
Route::post('/importUsers', 'ImportController@import');
Route::get('/admin/download/{path}', function ($path) {
    return Illuminate\Support\Facades\Response::download($path, 'example.csv');
})->where('path', '.*');

Route::livewire('/', 'landing.index')->layout('layouts.app')->name('landing')->middleware('check.time.choice');

// Admin
Route::livewire('/admin/login', 'admin.login.index')->layout('admin.layouts.auth')->name('admin.login.index')->middleware('admin.login');
Route::livewire('/admin/logout', 'admin.logout.index')->name('admin.logout');
Route::group(['middleware' => 'auth.admin'], function () {
    Route::livewire('/admin/dashboard', 'admin.dashboard.index')->layout('admin.layouts.app')->name('admin.dashboard.index');
    Route::livewire('/admin/aspiration', 'admin.aspiration.index')->layout('admin.layouts.app')->name('admin.aspiration.index');
    Route::livewire('/admin/choice', 'admin.choice.index')->layout('admin.layouts.app')->name('admin.choice.index');
    Route::livewire('/admin/config', 'admin.config.index')->layout('admin.layouts.app')->name('admin.config.index');
    Route::livewire('/admin/rating', 'admin.rating.index')->layout('admin.layouts.app')->name('admin.rating.index');
    Route::livewire('/admin/user', 'admin.user.index')->layout('admin.layouts.app')->name('admin.user.index');
    Route::livewire('/admin/create', 'admin.user.create')->layout('admin.layouts.app')->name('admin.user.create');
    Route::livewire('/admin/osis', 'admin.osis.index')->layout('admin.layouts.app')->name('admin.osis.index');
    Route::livewire('/admin/osis/edit', 'admin.osis.edit')->layout('admin.layouts.app')->name('admin.osis.edit');
    Route::livewire('/admin/candidate', 'admin.candidate.index')->layout('admin.layouts.app')->name('admin.candidate.index');
    Route::livewire('/admin/candidate/create', 'admin.candidate.create')->layout('admin.layouts.app')->name('admin.candidate.create');
    Route::livewire('/admin/candidate/edit/{id}', 'admin.candidate.edit')->layout('admin.layouts.app')->name('admin.candidate.edit');
    Route::livewire('/admin/profile', 'admin.profile.index')->layout('admin.layouts.app')->name('admin.profile.index');
    Route::livewire('/admin/profile/edit', 'admin.profile.edit')->layout('admin.layouts.app')->name('admin.profile.edit');
    Route::livewire('/admin/profile/change_password', 'admin.profile.change_password')->layout('admin.layouts.app')->name('admin.profile.change_password');
	Route::get('/exportAspiration', 'AspirationController@aspirationExport')->name('aspiration.export');
});

// User
Route::group(['middleware' => 'time.choice'], function () {
    Route::livewire('/login', 'login.index')->layout('layouts.auth')->name('login.index');
    Route::livewire('/profile', 'profile.index')->layout('layouts.app')->name('profile.index');
    Route::livewire('/choice', 'choice.index')->layout('layouts.app')->name('choice.index');
    Route::livewire('/rating', 'rating.index')->layout('layouts.app')->name('rating.index');
    Route::livewire('/aspiration', 'aspiration.index')->layout('layouts.app')->name('aspiration.index');
});
