<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();
Route::get('/register/confirm', 'Auth\RegisterController@registerConfirm');
Route::get('/email/success', 'Auth\ForgotPasswordController@successEmail')->name('success.email');

Route::get('/', 'HomeController@toIndex');
Route::get('/home', 'HomeController@index')->name('home');


// Demo routes
Route::get('/datatables', 'PagesController@datatables');
Route::get('/ktdatatables', 'PagesController@ktDatatables');
Route::get('/select2', 'PagesController@select2');
Route::get('/icons/custom-icons', 'PagesController@customIcons');
Route::get('/icons/flaticon', 'PagesController@flaticon');
Route::get('/icons/fontawesome', 'PagesController@fontawesome');
Route::get('/icons/lineawesome', 'PagesController@lineawesome');
Route::get('/icons/socicons', 'PagesController@socicons');
Route::get('/icons/svg', 'PagesController@svg');

// Quick search dummy route to display html elements in search dropdown (header search)
Route::get('/quick-search', 'PagesController@quickSearch')->name('quick-search');

// Routes admin
Route::group(['middleware' => ['auth', 'checkauth:3']], function() {
  Route::get('/admin/on-approval', 'OnApprovalController@index')->name('admin.onApproval');
  Route::get('/admin/on-approval/{user}/approval', 'OnApprovalController@approval')->name('approval');
  Route::get('/admin/on-approval/{user}/reject', 'OnApprovalController@reject')->name('reject');
  Route::get('/admin/list/users', 'UserController@index')->name('list.users');
  // Perfil Routes
  Route::get('/perfil/{user}', 'UserController@show')->name('perfil');
  Route::put('/perfil/{user}', 'UserController@update')->name('perfil.edit');
});
