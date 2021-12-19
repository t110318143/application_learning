<?php




Route::get('/permissions',[App\Http\Controllers\PermissionController::class, 'index'])->name('permissions.index');

Route::post('/permissions',[App\Http\Controllers\PermissionController::class, 'store'])->name('permissions.store');

Route::delete('/permissions/{permission}/destory',[App\Http\Controllers\PermissionController::class, 'destory'])->name('permissions.destory');

Route::get('/permissions/{permission}/edit',[App\Http\Controllers\PermissionController::class, 'edit'])->name('permissions.edit');

Route::put('/permissions/{permission}/update',[App\Http\Controllers\PermissionController::class, 'update'])->name('permissions.update');
