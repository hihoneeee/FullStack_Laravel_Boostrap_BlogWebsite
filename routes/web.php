<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionsController;

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

//<------------------------ Backend ----------------------------------------->
// Admincp
Route::group(['middleware' => ['role:admin']], function () {
    Route::resource('category',CategoryController::class);
    Route::resource('comment',CommentController::class);
    Route::resource('person',PersonController::class);
    Route::resource('info',InfoController::class);
    Route::resource('user',UserController::class);
    Route::resource('role',RoleController::class);
    Route::resource('permission',PermissionsController::class);
    route::get('/assign-role/{id}', [UserController::class, 'assign_role'])->name('assign-role');
    route::post('/insert-role/{id}', [UserController::class, 'insert_role'])->name('insert-role');

    route::get('/assign-permissions/{id}', [RoleController::class, 'assign_permissions'])->name('assign-permissions');
    route::post('/insert-permissions/{id}', [RoleController::class, 'insert_permissions'])->name('insert-permissions');
});

Route::group(['middleware' => ['role:writer|admin']], function () {
    Route::resource('post',PostController::class);
});

//Resort
Route::post('resorting', [\App\Http\Controllers\CategoryController::class, 'resorting'])->name('resorting');


//ajax
Route::post('/update-image-person-ajax', [PersonController::class, 'update_image_person_ajax'])->name('update-image-person-ajax');
Route::post('/update-post-movie-ajax', [PostController::class, 'update_image_post_ajax'])->name('update-image-post-ajax');
Route::get('/select-category', [PostController::class, 'select_category'])->name('select-category');
Route::get('/select-post-hot', [PostController::class, 'select_post_hot'])->name('select-post-hot');

Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');

//<------------------------ Fontend ----------------------------------------->
Route::get('/', [IndexController::class, 'home'])->name('homepage');
Route::get('/danh-muc/{slug}', [IndexController::class, 'category'])->name('category');
Route::get('/bai-viet/{slug}', [IndexController::class, 'post'])->name('post');
Route::get('/nguoi-viet/{slug}', [IndexController::class, 'person'])->name('person');
Route::get('/tim-kiem', [IndexController::class, 'timkiem'])->name('tim-kiem');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');