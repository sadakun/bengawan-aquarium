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
Auth::routes();

#Shop page
Route::get('/', [App\Http\Controllers\HomeController::class, 'shop'])->name('home');
#Blog page
Route::get('/blog', [App\Http\Controllers\HomeController::class, 'blog'])->name('blogs');

#ADMIN
Route::middleware('auth')->group(function()
{
    #Post page
    Route::get('/blog/post/{post}', [App\Http\Controllers\PostController::class, 'show'])->name('post');
    
    #Dasboard
    Route::get('/admin', [App\Http\Controllers\AdminsController::class, 'index'])->name('admin.index');
    
    #CRUD post
    Route::get('/admin/posts', [App\Http\Controllers\PostController::class, 'index'])->name('post.index');
    Route::get('/admin/posts/create', [App\Http\Controllers\PostController::class, 'create'])->name('post.create');
    Route::post('/admin/posts', [App\Http\Controllers\PostController::class, 'store'])->name('post.store');
    Route::get('/admin/posts/{post}/edit', [App\Http\Controllers\PostController::class, 'edit'])->name('post.edit');
    Route::patch('/admin/posts/{post}/update', [App\Http\Controllers\PostController::class, 'update'])->name('post.update');    
    Route::delete('/admin/posts/{post}/delete', [App\Http\Controllers\PostController::class, 'delete'])->name('post.delete');
    
    #Show user
    Route::get('/admin/users', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::delete('/admin/users/{user}/delete', [App\Http\Controllers\UserController::class, 'delete'])->name('user.delete');
    
    #user profile
    Route::get('/admin/users/{user}/profile', [App\Http\Controllers\UserController::class, 'show'])->name('user.profile.show');
    Route::put('/admin/users/{user}/update', [App\Http\Controllers\UserController::class, 'update'])->name('user.profile.update');

    Route::put('/admin/users/{user}/attach', [App\Http\Controllers\UserController::class, 'attach'])->name('user.role.attach');
    Route::put('/admin/users/{user}/detach', [App\Http\Controllers\UserController::class, 'detach'])->name('user.role.detach');

    #Authorization Roles
    Route::get('/admin/roles', [App\Http\Controllers\RoleController::class, 'index'])->name('roles.index');
    Route::post('/admin/roles', [App\Http\Controllers\RoleController::class, 'store'])->name('roles.store');
    Route::get('/admin/roles/{role}/edit', [App\Http\Controllers\RoleController::class, 'edit'])->name('roles.edit');
    Route::put('/admin/roles/{role}/update', [App\Http\Controllers\RoleController::class, 'update'])->name('roles.update');
    Route::delete('/admin/roles/{role}/delete', [App\Http\Controllers\RoleController::class, 'delete'])->name('roles.delete');

    Route::put('/admin/roles/{role}/attach', [App\Http\Controllers\RoleController::class, 'attach_permission'])->name('role.permission.attach');
    Route::put('/admin/roles/{role}/detach', [App\Http\Controllers\RoleController::class, 'detach_permission'])->name('role.permission.detach');

    #Authorization Permissions
    Route::get('/admin/permissions', [App\Http\Controllers\PermissionController::class, 'index'])->name('permissions.index');
    Route::post('/admin/permissions', [App\Http\Controllers\PermissionController::class, 'store'])->name('permissions.store');
    Route::get('/admin/permissions/{permission}/edit', [App\Http\Controllers\PermissionController::class, 'edit'])->name('permissions.edit');
    Route::put('/admin/permissions/{permission}/update', [App\Http\Controllers\PermissionController::class, 'update'])->name('permissions.update');
    Route::delete('/admin/permissions/{permission}/delete', [App\Http\Controllers\PermissionController::class, 'delete'])->name('permissions.delete');

    #comments
    Route::get('/admin/comments', [App\Http\Controllers\CommentController::class, 'index'])->name('comments.index');
    Route::post('/admin/comments', [App\Http\Controllers\CommentController::class, 'store'])->name('comments.store');
    Route::patch('/admin/comments/{id}/update', [App\Http\Controllers\CommentController::class, 'update'])->name('comments.update.status');
    Route::delete('/admin/comments/{id}/delete', [App\Http\Controllers\CommentController::class, 'delete'])->name('comments.delete');
    Route::get('/admin/comments/post/{comment}', [App\Http\Controllers\CommentController::class, 'show'])->name('comments.post.show');

    #replies
    Route::get('/admin/comments/replies/{reply}', [App\Http\Controllers\CommentReplyController::class, 'show'])->name('comment.replies.show');
    Route::post('/admin/comments/replies', [App\Http\Controllers\CommentReplyController::class, 'store'])->name('comment.replies.store');
    Route::patch('/admin/comments/replies/{id}/update', [App\Http\Controllers\CommentReplyController::class, 'update'])->name('replies.update.status');
    Route::delete('/admin/comments/replies/{id}/delete', [App\Http\Controllers\CommentReplyController::class, 'delete'])->name('comment.reply.delete');

});
