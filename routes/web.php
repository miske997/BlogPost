<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Authentication;
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


Auth::routes();

Route::get('/', 'HomeController@indeex')->name('homee');
Route::get('/post/{post}', 'PostController@shoow')->name('post');
/*
Route::get('/admin', function () {
    return view('admin.index');
});
*/

Route::middleware('auth')->group(function() {
    Route::get('/admin', 'AdminsController@index')->name('admin.index');
    
    Route::get('/admin/posts', 'PostController@index')->name('post.index');
    Route::get('/admin/posts/create', 'PostController@create')->name('post.create');
    Route::post('/admin/posts', 'PostController@store')->name('post.store');
   
    Route::get('/admin/posts/{post}/edit', 'PostController@edit')->name('post.edit');
    Route::delete('/admin/posts/{post}/destroy', 'PostController@destroy')->name('post.destroy');
    Route::patch('/admin/posts/{post}/updatee', 'PostController@updatee')->name('post.updatee');

    Route::get('/admin/users/{user}/profile', 'UserController@show')->name('users.profile.show');
    Route::put('/admin/users/{user}/update', 'UserController@update')->name('users.profile.update');

    Route::get('admin/users', 'UserController@index')->name('users.index');
    Route::delete('admin/users/{user}/destroy', 'UserController@destroy')->name('users.destroy');
});

Route::middleware('role:Admin')->group(function(){
    Route::get('admin/users', 'UserController@index')->name('users.index');
    Route::put('/users/{user}/attach', 'UserController@attach')->name('users.role.attach');
    Route::put('/users/{user}/detach', 'UserController@detach')->name('users.role.detach');
});

Route::middleware('role:Admin')->group(function(){
    Route::get('/roles', 'RoleController@index')->name('roles.index');
    Route::post('/roles', 'RoleController@store')->name('roles.store');
    Route::delete('/roles/{role}/destroy', 'RoleController@destroy')->name('roles.destroy');
    Route::get('/roles/{role}/edit', 'RoleController@edit')->name('roles.edit');
    Route::put('/roles/{role}/update', 'RoleController@update')->name('roles.update');
    Route::put('/roles/{role}/attach', 'RoleController@attach_permission')->name('role.permission.attach');
    Route::put('/roles/{role}/detach', 'RoleController@detach_permission')->name('role.permission.detach');
});


Route::middleware('role:Admin')->group(function(){
    Route::get('/permissions', 'PermissionController@index')->name('permissions.index');
    Route::post('/permissions', 'PermissionController@store')->name('permissions.store');
    Route::delete('/permissions/{permission}/destroy', 'PermissionController@destroy')->name('permissions.destroy');
    Route::get('/permissions/{permission}/edit', 'PermissionController@edit')->name('permissions.edit');
    Route::put('/permissions/{permission}/update', 'PermissionController@update')->name('permissions.update');

});

Auth::routes(['verify'=>true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

/*
Route::middleware(['can:view, user'])->group(function(){
    Route::get('/admin/users/{user}/profile', 'UserController@show')->name('users.profile.show');
});
*/