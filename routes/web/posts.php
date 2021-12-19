<?php

use Illuminate\Support\Facades\Route;



Route::get('/post/{post}', [App\Http\Controllers\PostController::class, 'show'])->name('post');



Route::middleware(['auth'])->group(function(){
    Route::get('/posts/create', [App\Http\Controllers\PostController::class, 'create'])->name('post.create');
    Route::post('/posts', [App\Http\Controllers\PostController::class, 'store'])->name('post.store');
    Route::get('/posts', [App\Http\Controllers\PostController::class, 'index'])->name('post.index');
    Route::delete('/posts/{post}/destory', [App\Http\Controllers\PostController::class, 'destory'])->name('post.destory');
    Route::get('/posts/{post}/edit', [App\Http\Controllers\PostController::class, 'edit'])->middleware('can:view,post')->name('post.edit');
    Route::patch('/posts/{post}/update', [App\Http\Controllers\PostController::class, 'update'])->name('post.update');

});
