<?php

use Illuminate\Support\Facades\Route;

// User Routes
Route::get('/', 'User\HomeController@index')->name('blog');

Route::get('/post/{post}', 'User\PostController@post')->name('post');

// Admin Routes
Route::get('/admin/home', 'Admin\HomeController@index')->name('admin.home');

Route::get('/admin/edit', 'Admin\ChangeController@index')->name('edit');

Route::post('/admin/change/{id}', 'Admin\ChangeController@change')->name('change');

Route::resource('/admin/post', 'Admin\PostController');

Route::resource('/admin/tag', 'Admin\TagController');

Route::resource('/admin/category', 'Admin\CategoryController');

Route::resource('/admin/role', 'Admin\RoleController');

Route::resource('/admin/permission', 'Admin\PermissionController');

Route::resource('/admin/user', 'Admin\UserController');

Route::get('/admin-login', 'Admin\Auth\LoginController@showLoginForm')->name('admin.login');

Route::post('/admin-login', 'Admin\Auth\LoginController@login');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
